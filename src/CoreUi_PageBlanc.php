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
        $this->head[] = \fhtml("link @rel=stylesheet @href=?", [str_replace("%assetPath%", $config->assetPath, $config->coreui_cssUrl)]);
        $this->head[] = \fhtml("link @rel=icon @href=?", [str_replace("%assetPath%", $config->assetPath, $config->favicon)]);
        $this->body->alter("@class=app ");
        $this->document[] = \fhtml("script @language=javascript @src=?", [str_replace("%assetPath%", $config->assetPath, $config->coreui_jsUrl)]);

        $this->coreui_navbar = $navbar = $this->body[] = \fhtml("header  ");
        $this->coreui_body = $body = $this->body[] = \fhtml("div @app-body");
        $this->coreui_sidebar = $body[] = \fhtml("div @sidebar");
        $this->coreui_main = $main = $body[] = \fhtml("main @class=main");

        if ($config->showBreadcrumbs) {
            $breadcrumb = $this->coreui_main[] = \fhtml("ol @breadcrumb");
            foreach ($config->breadcrumbPath as $elem) {
                $cur = $breadcrumb[] = \fhtml("li @breadcrumb-item");
                if (isset ($elem["href"])) {
                    $cur[] = \fhtml(["a  @href=:href" => $elem["name"]], $elem);
                }
            }
            $cur->alter("@class=active");
        } else {
            $breadcrumb = $this->coreui_main[] = \fhtml("ol @breadcrumb @breadcrumb-empty");
        }

        $this->coreui_main_content = $this->coreui_main["div @class=container-fluid"]["div @id=coreui_main_content @class=animated fadein"];




        if ($config->mainContent != null) {
            $this->coreui_main_content[] = $config->mainContent;
        }


        $this->coreui_aside = $this->coreui_body[] = \fhtml("aside @class=aside-menu");
    }


}
