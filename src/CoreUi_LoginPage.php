<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 09.07.18
 * Time: 12:56
 */

namespace Phore\Theme\CoreUI;


class CoreUi_LoginPage extends CoreUi_PageBlanc
{

    public function __construct(CoreUi_Config_LoginPage $config)
    {
        $config->mainContent = null;
        parent::__construct($config);

        $content = $this->coreui_main_content->alter("@class=app flex-row align-items-center");
        $container = $content[] = fhtml("div @container");
        $inner = $container["div @row @justify-content-center"]["div @col-md-8"]["div @card-group"];

        $leftCell = $inner["div @card @p-4"]["div @card-body"];
        $rightCell = $inner["div @class=card text-white bg-primary py-5 d-md-down-none @style=width:44%"]["div @card-body"];
        $rightCell[] = $config->rightSideHtml;
        $form = $leftCell;

        if ($config->formAction !== null)
            $form = $leftCell[] = fhtml("form @id=login-form @action=? @method=POST", [$config->formAction]);

        $form[] = $config->headerHtml;

        if ($config->errorMsgHtml !== null) {
            $form[] = fhtml(["div @class=alert alert-danger" => $config->errorMsgHtml]);
        }

        $form[] = $config->loginForm;
        $btnRow = $form[] = fhtml("div @class=row");
        $button = $btnRow["div @col-6"]["button @id=login-form-submit-button @class=btn btn-primary px-4 @type=submit"];
        $button[] = "Login";

        $resendPasswd = $btnRow["div @col-6 @text-right"]["button @id=login-form-resend-password-button @class=btn btn-link px-0 @type=button"];

        if ($config->showForgotPassword) {
            $resendPasswd[] = "Forgot password?";
        }

        $container["div"][] = $config->footerContent;
    }

}
