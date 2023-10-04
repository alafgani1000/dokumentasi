<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileRow extends Component
{
    /**
     * the file name
     *
     * @var string
     */
    public $name;

    /**
     * the size
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
     * the id of data
     *
     * @var integer
     */
    public $dataId;

    /**
     * the icon of file
     *
     * @var string
     */
    public $icon;

    /**
     * the class action
     *
     * @var string
     */
    public $actionClass;

    /**
     * link read file
     *
     * @var string
     */
    public $linkRead;

    /**
     * created at
     *
     * @var string
     */
    public $createDate;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $size, $author, $dataId, $icon, $actionClass, $linkRead, $createDate)
    {
        $this->name = $name;
        $this->size = $size;
        $this->author = $author;
        $this->dataId = $dataId;
        $this->icon = $icon;
        $this->actionClass = $actionClass;
        $this->linkRead = $linkRead;
        $this->createdDate = $createDate;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.file-row');
    }
}
