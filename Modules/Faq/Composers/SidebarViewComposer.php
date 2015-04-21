<?php namespace Modules\Faq\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group(trans('core::sidebar.content'), function (SidebarGroup $group) {
            $group->addItem(trans('faq::faqs.title.faqs'), function (SidebarItem $item) {
                $item->icon = 'fa fa-copy';
                $item->weight = 0;
                $item->append('admin.faq.faq.create');
                $item->route('admin.faq.faq.index');
                $item->authorize(
                    $this->auth->hasAccess('faq.faqs.index')
                );
            });
        });
    }
}
