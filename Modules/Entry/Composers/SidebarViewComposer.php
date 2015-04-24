<?php namespace Modules\Entry\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group(trans('core::sidebar.content'), function (SidebarGroup $group) {
            $group->addItem(trans('entry::entries.title.entries'), function (SidebarItem $item) {
                $item->icon = 'fa fa-copy';
                $item->weight = 0;
                $item->route('admin.entry.entry.index');
                $item->authorize(true);
            });
        });
    }
}
