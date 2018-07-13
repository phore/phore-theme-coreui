<?php

namespace Demo;

use Phore\MicroApp\App;
use Phore\MicroApp\Handler\JsonExceptionHandler;
use Phore\Theme\CoreUI\CoreUi_Config_PageWithAside;
use Phore\Theme\CoreUI\CoreUi_Config_PageWithSidebar;
use Phore\Theme\CoreUI\CoreUi_PageWithAside;
use Phore\Theme\CoreUI\CoreUi_PageWithSidebar;
use Phore\Theme\CoreUI\CoreUiModule;

require __DIR__ . "/../vendor/autoload.php";


$app = new App();
$app->setOnExceptionHandler(new JsonExceptionHandler());
$app->acl->addRule(aclRule()->route("/*")->ALLOW());

$app->addModule(new CoreUiModule());

$app->router->get("/", function () {
    header("Location: /PageWithAside");
    exit;
    return true;
});


$app->router->get("/PageWithSidebar", function () {
    $config = new CoreUi_Config_PageWithSidebar();
    $tpl = new CoreUi_PageWithSidebar($config);
    $tpl->out();
});

$app->router->get("/PageWithAside", function () {
    $config = new CoreUi_Config_PageWithAside();
    $tpl = new CoreUi_PageWithAside($config);
    $tpl->out();
});

$app->serve();
