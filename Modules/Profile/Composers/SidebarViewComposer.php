<?php namespace Modules\Profile\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group(trans('core::sidebar.content'), function (SidebarGroup $group) {
            $group->addItem('Profile', function (SidebarItem $item) {
                $item->icon = 'fa fa-copy';
                $item->weight = 10;
                $item->authorize(
                     /* append */
                );
                $item->addItem(trans('profile::profiles.title.profiles'), function (SidebarItem $item) {
                    $item->icon = 'fa fa-copy';
                    $item->weight = 0;
                    $item->append('admin.profile.profile.create');
                    $item->route('admin.profile.profile.index');
                    $item->authorize(
                        $this->auth->hasAccess('profile.profiles.index')
                    );
                });
// append

            });
        });
    }
}
