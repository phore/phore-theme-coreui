<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 27.06.18
 * Time: 13:56
 */

namespace Phore\Theme\CoreUI;


use Phore\MicroApp\App;
use Phore\MicroApp\AppModule;
use Phore\Theme\Bootstrap\Bootstrap4Module;

class CoreUiModule extends Bootstrap4Module
{

    /**
     * Called just after adding this to a app by calling
     * `$app->addModule(new SomeModule());`
     *
     * Here is the right place to add Routes, etc.
     *
     * @param App $app
     *
     * @return mixed
     */
    public function register(App $app)
    {
        parent::register($app);
        $app->addAssetSearchPath(__DIR__ . "/../lib-dist/");
    }
}