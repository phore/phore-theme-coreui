<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 13.06.18
 * Time: 10:51
 */

namespace Phore\Theme\CoreUI;




use Phore\Html\Elements\RawHtmlNode;
use Phore\Html\Fhtml\FHtml;
use Phore\Theme\Bootstrap\Bootstrap4_Page;

class CoreUi_PageBlanc extends Bootstrap4_Page
{

    /**
     * @var FHtml
     */
    public $coreui_navbar;
    /**
     * @var FHtml
     */
    public $coreui_body;

    public $coreui_sidebar;

    public $coreui_main;

    public $coreui_aside;


    public $coreui_main_content;

    public function __construct(CoreUi_Config_PageBlanc $config)
    {
        parent::__construct($config);
        $this->head->elem("link @rel=stylesheet @href=?", [$config->coreui_cssUrl]);
        $this->head->elem("link @rel=icon @href=?", [$config->favicon]);
        $this->body->alter("@class=app ");
        $this->document->elem("script @language=javascript @src=?", [$config->coreui_jsUrl]);

        $this->coreui_navbar = $navbar = $this->body->elem("header  ");
        $this->coreui_body = $body = $this->body->elem("div @app-body");
        $this->coreui_sidebar = $body->elem("div @sidebar");
        $this->coreui_main = $main = $body->elem("main @class=main");

        if ($config->showBreadcrumbs) {
            $breadcrumb = $this->coreui_main->elem("ol @breadcrumb");
            foreach ($config->breadcrumbPath as $elem) {
                $cur = $breadcrumb->elem("li @breadcrumb-item");
                if (isset ($elem["href"])) {
                    $cur = $cur->elem("a  @href=:href", $elem);
                }
                $cur->content($elem["name"]);
            }
            $cur->alter("@class=active");
        } else {
            $breadcrumb = $this->coreui_main->elem("ol @breadcrumb @breadcrumb-empty");
        }

        $this->coreui_main_content = $this->coreui_main->elem("div @class=container-fluid")
            ->elem("div @id=coreui_main_content @class=animated fadein");


        if ($config->mainContent != null) {
            $this->coreui_main_content->tpl($config->mainContent);
        }


        $this->coreui_aside = $this->coreui_body->elem("aside @class=aside-menu");
    }


}