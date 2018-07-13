<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 13.06.18
 * Time: 18:09
 */

namespace Phore\Theme\CoreUI;




use Phore\Theme\Bootstrap\Bootstrap4_Config;

class CoreUi_Config_PageBlanc extends Bootstrap4_Config
{

    public static $DEFAULT_CSSURL = "/asset/all.css";
    public static $DEFAULT_JSURL = "/asset/all.js";

    public $coreui_cssUrl = "";
    public $coreui_jsUrl = "";

    public $showBreadcrumbs = false;

    public $favicon = "/asset/brand-logo.png";

    public $breadcrumbPath = [
        [
            "name" => "Home"
        ],
        [
            "name" => "Link1",
            "href" => "#"
        ],
        [
            "name" => "Link2",
            "href" => "#"
        ]
    ];

    public $breadcrumbMenu = [
        [
            "icon" => "fas fa-bed",
            "name" => "Entry one",
            "href" => "#"
        ]
    ];


    public $mainContent = [
        "Hello World!"
    ];


    public function __construct()
    {
        $this->coreui_jsUrl = self::$DEFAULT_JSURL;
        $this->coreui_cssUrl = self::$DEFAULT_CSSURL;

        $this->content = null;

        $this->cssUrls[] = "/asset/coreui.css";
        $this->cssUrls[] = "/asset/coreui-user-styles.css";

        $this->jsUrls[] = "/asset/coreui.min.js";
        $this->jsUrls[] = "/asset/pace.min.js";
        $this->jsUrls[] = "/asset/perfect-scrollbar.min.js";
    }

}