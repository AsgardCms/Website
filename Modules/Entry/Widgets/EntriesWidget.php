<?php namespace Modules\Entry\Widgets;

use Modules\Dashboard\Foundation\Widgets\BaseWidget;
use Modules\Entry\Repositories\EntryRepository;

class EntriesWidget extends BaseWidget
{
    /**
     * @var EntryRepository
     */
    private $entry;

    public function __construct(EntryRepository $entry)
    {
        $this->entry = $entry;
    }

    /**
     * Get the widget name
     * @return string
     */
    protected function name()
    {
        return 'EntriesWidget';
    }

    /**
     * Return an array of widget options
     * Possible options:
     *  x, y, width, height
     * @return array
     */
    protected function options()
    {
        return [
            'width' => '2',
            'height' => '2',
        ];
    }

    /**
     * Get the widget view
     * @return string
     */
    protected function view()
    {
        return 'entry::admin.widgets.entries';
    }

    /**
     * Get the widget data to send to the view
     * @return array
     */
    protected function data()
    {
        return [
            'entriesAmount' => $this->entry->countAll(),
        ];
    }
}
