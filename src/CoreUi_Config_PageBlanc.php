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

    public static $DEFAULT_CSSURL = "%assetPath%/all.css";
    public static $DEFAULT_JSURL = "%assetPath%/all.js";

    public $coreui_cssUrl = "";
    public $coreui_jsUrl = "";

    public $showBreadcrumbs = false;

    public $favicon = "%assetPath%/brand-logo.png";

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

        $this->cssUrls[] = "%assetPath%/coreui.css";
        $this->cssUrls[] = "%assetPath%/coreui-user-styles.css";

        $this->jsUrls[] = "%assetPath%/coreui.min.js";
        $this->jsUrls[] = "%assetPath%/pace.min.js";
        $this->jsUrls[] = "%assetPath%/perfect-scrollbar.min.js";
    }

}