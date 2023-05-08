<?php

namespace Modules\Admin\Sidebar;

use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Maatwebsite\Sidebar\Group;
use Modules\Base\Sidebar\BaseSidebarExtender;

class SidebarExtender extends BaseSidebarExtender
{
    public function extend(Menu $menu)
    {
       /* $menu->group(clean(trans('admin::sidebar.main')), function (Group $group) {
            
            $group->weight(5);
            $group->hideHeading();
            
            $group->item(clean(trans('admin::dashboard.dashboard')), function (Item $item) {
                $item->icon('fas fa-home');
                $item->route('admin.dashboard.index');
                $item->isActiveWhen(route('admin.dashboard.index', null, false));
            });
        });
        */
        $menu->group(clean(trans('admin::sidebar.activity')), function (Group $group) {
            $group->weight(25);
            $group->authorize(
                   $this->auth->hasAccess('admin.activity.index')
            );
            // activity
             $group->item(clean(trans('admin::sidebar.activitylogs')), function (Item $item) {
                $item->weight(5);
                $item->icon('fas fa-user-clock');
                $item->route('admin.activity.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.activity.index')
                );
            });

            
        });
        
        $menu->group(clean(trans('admin::sidebar.sra')), function (Group $group) {
            $group->weight(25);
            $group->authorize(
                   $this->auth->hasAccess('admin.sra.index')
            );
            // activity
             $group->item(clean(trans('admin::sidebar.sralogs')), function (Item $item) {
                $item->weight(5);
                $item->icon('fas fa-user-clock');
                $item->route('admin.sra.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.sra.index')
                );
            });

            $group->item(clean(trans('admin::sidebar.srareport')), function (Item $item) {
                $item->weight(10);
                $item->icon('fas fa-download');
                $item->route('admin.sra.report');
                $item->authorize(
                    $this->auth->hasAccess('admin.sra.report')
                );
            });

            $group->item(clean(trans('admin::sidebar.viewsrareport')), function (Item $item) {
                $item->weight(15);
                $item->icon('fas fa-eye'); // Change the icon to an eye icon for viewing
                $item->url(route('admin.sra.viewreport'));
                $item->authorize($this->auth->hasAccess('admin.sra.viewreport'));
            });
            
        });

        $menu->group(clean(trans('admin::sidebar.missingelectiondocuments')), function (Group $group) {
            $group->weight(25);
            $group->authorize(
                   $this->auth->hasAccess('admin.missingelectiondocuments.index')
            );
            // activity
             $group->item(clean(trans('admin::sidebar.missingelectiondocumentslogs')), function (Item $item) {
                $item->weight(5);
                $item->icon('fas fa-list');
                $item->route('admin.missingelectiondocuments.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.missingelectiondocuments.index')
                );
            });
              $group->item(clean(trans('admin::sidebar.missingelectricitydocumentslogs')), function (Item $item) {
                $item->weight(5);
                $item->icon('fas fa-list');
                $item->route('admin.missingelectricitydocuments.index');
                $item->authorize(
                    $this->auth->hasAccess('admin.missingelectricitydocuments.index')
                );
            });

            
        });
        

    }
}
