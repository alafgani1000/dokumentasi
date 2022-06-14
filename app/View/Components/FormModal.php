<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormModal extends Component
{
    /**
     * the form id modal
     *
     * @var string
     */
    public $id_modal;

    /**
     * the id form
     *
     * @var string
     */
    public $id_form;

    /**
     * the action form
     *
     * @var string
     */
    public $action;

    /**
     * the form method
     *
     * @var string
     */
    public $method;

    /**
     * the title form
     *
     * @var string
     */
    public $title;

    /**
     * the message alert
     *
     * @var string
     */
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id_modal, $id_form, $action, $method, $title, $message)
    {
        $this->id_modal = $id_modal;
        $this->id_form = $id_form;
        $this->action = $action;
        $this->method = $method;
        $this->$title = $title;
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-modal');
    }
}
