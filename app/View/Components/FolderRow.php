<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FolderRow extends Component
{
    /**
     * the name category
     *
     * @var string
     */
    public $name;

    /**
     * the size data
     *
     * @var string
     */
    public $size;

    /**
     * the author
     *
     * @var string
     */
    public $author;

    /**
     * the last update date
     *
     * @var string
     */
    public $lastDate;

    /**
     * the id data
     *
     * @var string
     */
    public $dataId;

    /**
     * the link data
     *
     * @var string
     */
    public $dataLink;

    /**
     * the action class
     *
     * @var string
     */
    public $actionClass;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $size, $author, $lastDate, $dataId, $dataLink, $actionClass)
    {
        $this->name = $name;
        $this->size = $size;
        $this->author = $author;
        $this->lastDate = $lastDate;
        $this->dataId = $dataId;
        $this->dataLink = $dataLink;
        $this->actionClass = $actionClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.folder-row');
    }
}
