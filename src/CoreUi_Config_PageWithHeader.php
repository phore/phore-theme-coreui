<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 13.06.18
 * Time: 18:14
 */

namespace Phore\Theme\CoreUI;


class CoreUi_Config_PageWithHeader extends CoreUi_Config_PageBlanc
{

    public function __construct()
    {
        parent::__construct();
        $this->showBreadcrumbs = true;
    }

    public $brandLogoUrl = "/fixture/bootstrap-solid.svg";
    public $brandClickHref = "#";
    public $brandName = "BootUi";

    public $header_menu_main = [
        [
            "icon" => "fas fa-home",
            "name" => "Pages",
            "href" => "#",
            "children" => [
                [
                    "name" => "Basic",
                    "href" => "./"
                ],
                [
                    "name" => "Sidebar",
                    "href" => "sidebar.php"
                ],
                [
                    "name" => "Aside",
                    "href" => "aside.php"
                ],
                [
                    "name" => "Blanc",
                    "href" => "blanc.php"
                ],
                [
                    "name" => "Login Page",
                    "href" => "login.php"
                ]
            ]
        ],
        [
            "name" => "Users",
            "href" => "#"
        ]
    ];

    public $header_badgebar = [
        [
            "icon" => "fas fa-inbox",
            "badge" => ["content"=>"10", "class"=>"badge-danger"],
            "href" => "#"
        ],
        [
            "icon" => "fas fa-bell",
            "href" => "#",
            "children" => [
                [
                    "icon" => "fas fa-info",
                    "name" => " Messages",
                    "href" => "#"
                ],
                [
                    "icon" => "fas fa-info",
                    "name" => " Messages",
                    "href" => "#"
                ]
            ]
        ],
        [
            "icon" => "fas fa-user",
            "href" => "#",
            "children" => [
                [
                    "icon" => "fas fa-sign-out-alt",
                    "name" => "Logout",
                    "href" => "/logout"
                ]
            ]
        ]
    ];

    public $footer = [
        "div" => [
            "a @href=#" => "Some Project",
            "span" => "Copyright"
        ],
        "div @class=ml-auto" => [
            "span" => "Powered by",
            "a @href=#" => "SomeCompany"
        ]
    ];
}