<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 14.06.18
 * Time: 12:10
 */

namespace Phore\Theme\CoreUI;


class CoreUi_Config_PageWithSidebar extends CoreUi_Config_PageWithHeader
{


    public $sidebarMenu = [
        [
            "icon" => "fas fa-archive",
            "name" => "Menu1",
            "badge" => ["content"=>"10", "class"=>"badge-danger"],
            "href" => "#",
        ],
        [
            "icon" => "fas fa-bookmark",
            "name" => "Menu 2",
            "href" => "#",
            "children" => [
                [
                    "icon" => "fas fa-envelope",
                    "name" => " Messages",
                    "href" => "#"
                ],
                [
                    "icon" => "fas fa-envelope",
                    "name" => " Messages",
                    "href" => "#"
                ]
            ]
        ]
    ];

}