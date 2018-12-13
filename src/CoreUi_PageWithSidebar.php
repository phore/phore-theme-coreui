<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 14.06.18
 * Time: 12:11
 */

namespace Phore\Theme\CoreUI;



use Phore\Theme\CoreUI\Helper\NavHelperMenu;

class CoreUi_PageWithSidebar extends CoreUi_PageWithHeader
{




    public function __construct(CoreUi_Config_PageWithSidebar $config)
    {
        parent::__construct($config);
        $this->body->alter("@class=+sidebar-lg-show +sidebar-fixed");


        $sidebarNav = $this->coreui_sidebar[] = fhtml("nav @sidebar-nav");

        $b = new NavHelperMenu();
        $b->config["ul_CssClass"] = "nav";
        $b->build($config->sidebarMenu, $sidebarNav);

        $this->coreui_sidebar[] = fhtml("button @class=sidebar-minimizer brand-minimizer @type=button");



    }

}