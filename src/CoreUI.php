<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 13.06.18
 * Time: 10:47
 */

namespace Phore\Theme\CoreUI;

class CoreUI
{
    const COREUI_ASSET_PATH = __DIR__ . "/../../../lib-dist";

    const COREUI_CSS_FILES = [
        self::COREUI_ASSET_PATH . "/coreui.css",
        self::COREUI_ASSET_PATH . "/coreui-user-styles.css"
    ];

    const COREUI_JS_FILES = [
        self::COREUI_ASSET_PATH . "/perfect-scrollbar.min.js",
        self::COREUI_ASSET_PATH . "/pace.min.js",
        self::COREUI_ASSET_PATH . "/coreui.min.js"
    ];

    public static $config = [
        "css-url" => "/unset/css/config",
        "js-url"  => "/unset/js/config"
    ];

    public function __construct()
    {
        if ( ! file_exists(self::COREUI_ASSET_PATH))
            throw new \Exception("CoreUI Library is not installed. Run composer install coreui/coreui");
    }

    public function ConfigurePhoreMicroApp()
    {

    }

    public static function BuildAdminPage() : CoreUiPageBlanc
    {
        $theme = new CoreUiPageBlanc(self::$config["js-url"], self::$config["css-url"], new CoreUiConfig());
        return $theme;
    }
}