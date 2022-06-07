<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{

    /**
     * the alert id
     *
     * @var string
     */
    public $id;

    /**
     * the alert class
     *
     * @var string
     */
    public $class;

    /**
     * the alert message
     *
     * @var string
     */
    public $message;

    /**
     * the alert title
     *
     * @var string
     */
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $class, $message, $title)
    {
        $this->id = $id;
        $this->class = $class;
        $this->message = $message;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
