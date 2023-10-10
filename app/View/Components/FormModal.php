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
    public $idModal;

    /**
     * the id form
     *
     * @var string
     */
    public $idForm;

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
    public $modalTitle;

    /**
     * default textbutton
     *
     * @var string
     */
    public $defaultTextButton;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($idModal, $idForm, $action, $method, $modalTitle, $defaultTextButton = 'Save')
    {
        $this->idModal = $idModal;
        $this->idForm = $idForm;
        $this->action = $action;
        $this->method = $method;
        $this->modalTitle = $modalTitle;
        $this->defaultTextButton = $defaultTextButton;
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
