<?php

namespace App\Providers;

use App\Statics\User\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Laravel\Telescope\EntryType;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;
use Laravel\Telescope\TelescopeApplicationServiceProvider;

class TelescopeServiceProvider extends TelescopeApplicationServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Telescope::night();

        $this->hideSensitiveRequestDetails();

        $isWatch = config('telescope.watch');

        Telescope::filter(function () use ($isWatch) {
            return $isWatch;
        });
	    
	    Telescope::tag(function (IncomingEntry $entry) {
		    $entryContent = $entry->content;
		    
		    if ($entry->type === EntryType::CACHE) {
			    return [
				    'Action:'.$entryContent['type'],
				    'Key:'.$entryContent['key'],
				    $entryContent['key'].':'.$entryContent['type'],
			    ];
		    }
		    
		    if ($entry->type === EntryType::VIEW) {
			    return [
				    'File:'.str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $entryContent['path']),
				    'FileRealPath:'.base_path().str_replace(['/', '\\'], [DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR], $entryContent['path']),
			    ];
		    }
		    
		    if ($entry->type === EntryType::REQUEST) {
			    $authUserTag = [];
			    if (Auth::check()) {
				    $authorizedUser = Auth::user();
				    $authUserTag = [
					    'Email:'.$authorizedUser->email,
					    'Name:'.$authorizedUser->name,
					    'NRIK:'.$authorizedUser->nrik,
				    ];
			    }
			    
			    $requestTags = [
				    'Method:'.$entryContent['method'],
				    'Status:'.$entryContent['response_status'],
				    'IP:'.request()->ip(),
			    ];
			    
			    return array_merge($requestTags, $authUserTag);
		    }
			
		    if ($entry->type === EntryType::MODEL) {
			    $modelName = Str::before($entryContent['model'], ':');
			    $modelAction = ucfirst($entryContent['action']);
			    return [
				    'ModelAction:'.$modelAction,
				    'ModelName:'.$modelName,
				    $modelName.':'.$modelAction,
			    ];
		    }
		    
		    if ($entry->type === EntryType::EXCEPTION) {
			    return [
					'ClassName:'.$entryContent['class']
			    ];
		    }
		    
		    if ($entry->type === EntryType::MAIL) {
			    return [
					'MailName:'.$entryContent['mailable'],
					'MailTo:'.array_keys($entryContent['to'])[0],
					'MailFrom:'.array_keys($entryContent['from'])[0],
					'MailSubject:'.$entryContent['subject']
			    ];
		    }
		    
		    return [];
	    });
    }

    /**
     * Prevent sensitive request details from being logged by Telescope.
     */
    protected function hideSensitiveRequestDetails(): true
    {
        if ($this->app->environment('local', 'development')) {
            return true;
        }

        Telescope::hideRequestParameters(['_token']);

        Telescope::hideRequestHeaders([
            'cookie',
            'x-csrf-token',
            'x-xsrf-token',
        ]);
		
		return true;
    }

    /**
     * Register the Telescope gate.
     *
     * This gate determines who can access Telescope in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewTelescope', function ($user) {
            return $user->hasRole([Role::$DEVELOPER, Role::$SUPER_ADMIN]);
        });
    }
}
