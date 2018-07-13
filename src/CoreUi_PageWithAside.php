<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 14.06.18
 * Time: 15:25
 */

namespace Phore\Theme\CoreUI;




use Phore\Html\Elements\RawHtmlNode;

class CoreUi_PageWithAside extends CoreUi_PageWithSidebar
{


    public $coreui_aside_tabs;
    public $coreui_aside_tabcontent;

    public function __construct(CoreUi_Config_PageWithAside $config)
    {
        parent::__construct($config);

        $this->body->alter("@class=+aside-menu-fixed");

        $this->coreui_aside_tabs = $tabs = $this->coreui_aside->elem("ul @class=nav nav-tabs @role=tablist");
        foreach ($config->asideTabs as $index => $curTab) {
            $tabs->elem("li @nav-item")
                ->elem("a @data-toggle=tab @nav-link @href=:id @class=:active", ["id"=>"#".$curTab["id"], "active"=>$index==0 ? "active" : ""])
                    ->elem("i @class=:icon", $curTab);
        }

        $this->coreui_aside_tabcontent = $tc = $this->coreui_aside->elem("div @tab-content");
        foreach ($config->asideTabs as $index => $curTab) {
            $tabElem = $tc->elem("div @tab-pane @id=:id @class=:active @role=tabpanel", ["id"=>$curTab["id"], "active"=>$index==0 ? "active" : "" ]);

            if (isset($config->asideContent[$curTab["id"]])) {
                $tContent = $config->asideContent[$curTab["id"]];
                if (is_array($tContent))
                    $tabElem->tpl($tContent);
                if (is_string($tContent))
                    $tabElem->content(new RawHtmlNode($tContent));

            }
        }

    }

}