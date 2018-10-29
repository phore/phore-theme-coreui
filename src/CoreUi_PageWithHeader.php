<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 13.06.18
 * Time: 18:14
 */

namespace Phore\Theme\CoreUI;



use Phore\Html\Fhtml\FHtml;
use Phore\Theme\CoreUI\Helper\NavHelper;

class CoreUi_PageWithHeader extends CoreUi_PageBlanc
{





    /**
     * @var FHtml
     */
    public $coreui_navbar_nav;




    public $coreui_footer;

    public $coreui_content;





    public function __construct(CoreUi_Config_PageWithHeader $config)
    {
        parent::__construct($config);
        $this->body->alter("@class=+header-fixed");

        $this->head->elem("style")->content(".brand-img { background-image: url({$config->brandLogoUrl}); }");

        $this->coreui_navbar->alter("@class=+app-header +navbar");

        $navbar = $this->coreui_navbar;
        $navbar->elem("button @class=navbar-toggler sidebar-toggler d-lg-none mr-auto @type=button @data-toggle=sidebar-show")
                ->elem("span @navbar-toggler-icon");

        $navbar
            ->elem("a @navbar-brand  @href=?", $config->brandClickHref)
                ->elem("i @brand-img @navbar-brand-img @navbar-brand-full")->end()
                ->elem("i @brand-img @navbar-brand-img @navbar-brand-minimized")->end()
                ->elem("span @brand-name @d-md-down-none @navbar-brand-full")->content($config->brandName);


        if ($this instanceof CoreUi_PageWithSidebar) {
            $navbar->elem("button @class=navbar-toggler sidebar-toggler d-md-down-none @type=button @data-toggle=sidebar-lg-show")
                ->elem("span @navbar-toggler-icon");
        }

        $mb = new NavHelper();
        $mb->config["li_CssClass"] .= " px-3";
        $mb->build($config->header_menu_main, $navbar, "d-md-down-none");

        $mb = new NavHelper();
        $mb->config["menu_css_class"] = "dropdown-menu-right";
        $mb->build($config->header_badgebar, $navbar, "ml-auto");
        $navbar->elem("div @style=width:20px");

        if ($this instanceof CoreUi_PageWithAside) {
            $navbar->elem("button @class=navbar-toggler aside-menu-toggler d-md-down-none @type=button @data-toggle=aside-menu-lg-show")
                ->elem("span @navbar-toggler-icon");
            $navbar->elem("button @class=navbar-toggler aside-menu-toggler d-lg-none @type=button @data-toggle=aside-menu-sho")
                ->elem("span @navbar-toggler-icon");
        }

        if ($config->footer !== null) {
            $this->coreui_footer = $this->body->elem("footer @app-footer");
            $this->coreui_footer->tpl($config->footer);
        }

    }

}