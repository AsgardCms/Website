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
            $group->weight = 50;

            $group->addItem('Faq', function (SidebarItem $item) {
                $item->icon = 'fa fa-copy';
                $item->weight = 10;
                $item->authorize(
                     /* append */
                );
                $item->addItem(trans('faq::questions.title.questions'), function (SidebarItem $item) {
                    $item->icon = 'fa fa-copy';
                    $item->weight = 0;
                    $item->append('admin.faq.question.create');
                    $item->route('admin.faq.question.index');
                    $item->authorize(
                        $this->auth->hasAccess('faq.questions.index')
                    );
                });
                $item->addItem(trans('faq::answers.title.answers'), function (SidebarItem $item) {
                    $item->icon = 'fa fa-copy';
                    $item->weight = 0;
                    $item->append('admin.faq.answer.create');
                    $item->route('admin.faq.answer.index');
                    $item->authorize(
                        $this->auth->hasAccess('faq.answers.index')
                    );
                });
// append


            });
        });
    }
}
