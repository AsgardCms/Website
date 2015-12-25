<?php namespace Modules\Module\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item('Modules', function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize($this->auth->hasAccess('module.categories.index'));
                $item->item(trans('module::categories.title.categories'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(1);
                    $item->append('admin.module.category.create');
                    $item->route('admin.module.category.index');
                    $item->authorize($this->auth->hasAccess('module.categories.index'));
                });
                $item->item(trans('module::modules.title.modules'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.module.module.create');
                    $item->route('admin.module.module.index');
                    $item->authorize($this->auth->hasAccess('module.modules.index'));
                });
            });
        });

        return $menu;
    }
}
