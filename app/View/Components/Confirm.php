<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Confirm extends Component
{
    /**
     * the message
     *
     */
    public $message;

    /**
     * the modal id
     *
     */
    public $modalId;

    /**
     * the button id
     *
     */
    public $btnId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $modalId, $btnId)
    {
        $this->message = $message;
        $this->modalId = $modalId;
        $this->btnId = $btnId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.confirm');
    }
}
