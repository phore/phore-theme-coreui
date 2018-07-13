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
        $inner = $content->elem("div @container")
            ->elem("div @row @justify-content-center")
            ->elem("div @col-md-8")
            ->elem("div @card-group");

        $leftCell = $inner->elem("div @card @p-4")->elem("div @card-body");
        $rightCell = $inner->elem("div @class=card text-white bg-primary py-5 d-md-down-none @style=width:44%")->elem("div @card-body ");
        $rightCell->tpl($config->rightSideHtml);
        $form = $leftCell;

        if ($config->formAction !== null)
            $form = $leftCell->elem("form @id=login-form @action=? @method=POST",[$config->formAction]);

        $form->tpl($config->headerHtml);

        if ($config->errorMsgHtml !== null) {
            $form->elem("div @class=alert alert-danger")->tpl($config->errorMsgHtml);
        }

        $form->tpl($config->loginForm);
        $btnRow = $form->elem("div @class=row");
        $button = $btnRow->elem("div @col-6")->elem("button @id=login-form-submit-button @class=btn btn-primary px-4 @type=submit");
        $button->content("Login");


        $resendPasswd = $btnRow->elem("div @col-6 @text-right")
            ->elem("button @id=login-form-resend-password-button @class=btn btn-link px-0 @type=button");

        if ($config->showForgotPassword) {
            $resendPasswd->content("Forgot password?");
        }




    }

}