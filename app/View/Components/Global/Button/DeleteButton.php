<?php

namespace App\View\Components\Global\Button;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteButton extends Component
{
	/**
	 * Create a new component instance.
	 * @param string $route
	 * @param array $buttonAttributes ['title','text']
	 * @param string $title
	 */
    public function __construct(public string $route, public array $buttonAttributes = [], public string $title = 'Hapus')
    {
        //
    }
	
	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return View
	 */
	public function render(): View
	{
		return view('components.global.button.delete');
	}
}
