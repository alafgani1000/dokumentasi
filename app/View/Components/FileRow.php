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
     * the update date
     *
     * @var string
     */
    public $update_date;

    /**
     * the id of data
     *
     * @var integer
     */
    public $data_id;

    /**
     * the link of data
     *
     * @var string
     */
    public $data_link;

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
    public $action_class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $size, $author, $update_date, $data_id, $data_link, $icon)
    {
        $this->name = $name;
        $this->size = $size;
        $this->author = $author;
        $this->update_date = $update_date;
        $this->data_id = $data_id;
        $this->data_link = $data_link;
        $this->icon = $icon;
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
