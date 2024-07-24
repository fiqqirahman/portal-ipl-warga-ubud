<?php

namespace App\View\Components\Global\Button;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EditButton extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $route, public string $title = 'Ubah')
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
        return view('components.global.button.edit');
    }
}
