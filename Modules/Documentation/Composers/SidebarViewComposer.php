<?php namespace Modules\Documentation\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group(trans('core::sidebar.content'), function (SidebarGroup $group) {
            $group->addItem('Documentation', function (SidebarItem $item) {
                $item->icon = 'fa fa-files-o';
                $item->weight = 0;
                $item->route('admin.docs.index');
                $item->authorize(true);
            });
        });
    }
}
