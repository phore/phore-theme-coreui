<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.07.18
 * Time: 12:56
 */

namespace Phore\Theme\CoreUI;


class CoreUi_Config_LoginPage extends CoreUi_Config_PageBlanc
{


    public function __construct()
    {
        parent::__construct();
        //$this->jsCode[] = 'window.setTimeout(function() {console.log("muh");$("#username").focus();}, 1500);';

    }


    public $headerHtml = [
        ["h1" => "Login"],
        ["p @text-muted" => "Sign in to your account"]
    ];

    public $rightSideHtml = [
        "div @text-center" => [
            "div" => [
                ["h2" => "Sign Up"],
                ["p" => "Some text here"],
                ["button @class=btn btn-primary active mt-3" => "Register now!"]
            ]
        ]
    ];

    public $loginForm = [
        [
            "div @class=input-group mb-3" => [
                "div @class=input-group-prepend" => [
                    "span @class=input-group-text" => [
                        "i @class=fas fa-user" => ""
                    ]
                ],
                ["input @type=text @id=username @name=username @form-control"=>""]
            ]
        ],
        [
            "div @class=input-group mb-3" => [
                "div @class=input-group-prepend" => [
                    "span @class=input-group-text" => [
                        "i @class=fas fa-key" => ""
                    ]
                ],
                ["input @type=password @id=password @name=password @form-control"=> ""]
            ]
        ]
    ];


    public $showForgotPassword = false;

    public $errorMsgHtml = ["Your credentials are invalid"];


    public $formAction = "/login";


}