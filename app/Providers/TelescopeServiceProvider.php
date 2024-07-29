<?php

namespace App\Providers;

use App\Models\LogActivity;
use App\Models\Menu;
use App\Models\MenuHasRole;
use App\Models\Permission;
use App\Models\Role;
use App\Statics\User\Role as StaticRole;
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

        Telescope::filter(function (IncomingEntry $entry) use ($isWatch) {
			if(!$isWatch) {
				return false;
			}
			
	        if ($entry->type === EntryType::QUERY) {
		        if($this->filterQueries($entry->content['sql'])){
					return false;
		        }
	        }
			
			if($entry->type === EntryType::MODEL && in_array(
				Str::before($entry->content['model'], ':'),
				$this->filterModelsList())
			){
				return false;
			}
			
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
            return $user->hasRole([StaticRole::$DEVELOPER, StaticRole::$SUPER_ADMIN]);
        });
    }
	
	private function filterQueriesList(): array
	{
		return [
			/** @lang text */ 'select * from "menus" where',
			/** @lang text */ 'select "roles".*, "menu_has_role"."menu_id" as',
			/** @lang text */ 'select a.attname as name, t.typname as type_name',
			/** @lang text */ 'select "roles".*, "model_has_roles"."model_id"',
			/** @lang text */ 'select * from "users" where "id"',
			/** @lang text */ 'select * from "users" where ("sso_user_id"'
		];
	}
	
	private function filterQueries(string $text): bool
	{
		foreach ($this->filterQueriesList() as $searchText) {
			if (str_contains($text, $searchText)) {
				return true;
			}
		}
		return false;
	}
	
	private function filterModelsList(): array
	{
		return [
			Role::class, Menu::class, Permission::class, MenuHasRole::class, LogActivity::class, \Spatie\Permission\Models\Role::class
		];
	}
}
