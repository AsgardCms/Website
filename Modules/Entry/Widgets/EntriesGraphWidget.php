<?php namespace Modules\Entry\Widgets;

use Modules\Dashboard\Foundation\Widgets\BaseWidget;
use Modules\Entry\Repositories\EntryRepository;

class EntriesGraphWidget extends BaseWidget
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
        return 'EntriesGraphWidget';
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
            'width' => '3',
            'height' => '3',
        ];
    }

    /**
     * Get the widget view
     * @return string
     */
    protected function view()
    {
        return 'entry::admin.widgets.entries-graph';
    }

    /**
     * Get the widget data to send to the view
     * @return array
     */
    protected function data()
    {
        return [
            'totalAcceptedAndCompleted' => $this->entry->countAcceptedAndCompleted(),
            'totalAcceptedAndNotCompleted' => $this->entry->countAcceptedAndNotCompleted(),
            'totalNotInvited' => $this->entry->countTotalNotInvited(),
        ];
    }
}
