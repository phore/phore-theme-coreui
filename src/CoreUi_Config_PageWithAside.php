<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 14.06.18
 * Time: 15:24
 */

namespace Phore\Theme\CoreUI;


class CoreUi_Config_PageWithAside extends CoreUi_Config_PageWithSidebar
{

    public $asideTabs = [
        [
            "icon" => "fas fa-code",
            "id" => "someId1"
        ],
        [
            "icon" => "fas fa-font",
            "id" => "someId2"
        ]
    ];

    public $asideContent = [
        "someId1" => "Some <b>Html</b> Code",

        "someId2" => [
            "span" => "text",
        ]
    ];

}