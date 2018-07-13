<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 14.06.18
 * Time: 09:14
 */

namespace Phore\Theme\CoreUI\Helper;



use Phore\Html\Elements\RawHtmlNode;
use Phore\Html\Fhtml\FHtml;

class NavHelper
{
    const TYPE_ELEMENT = "ELEMENT";
    const TYPE_TITLE = "TITLE";
    const TYPE_SPACER = "SPACER";
    const TYPE_HTML = "HTML";

    public $config = [
        "ul_CssClass" => "nav navbar-nav",
        "li_CssClass" => "nav-item",
        "li_dropdown_CssClass" => "dropdown",
        "menu_css_class" => ""
    ];

    public function __construct(array $config=[])
    {
        $this->config = array_merge($this->config, $config);
    }


    public function buildElementContent(array $element, FHtml $targetNode )
    {
        if (isset ($element["icon"]))
            $targetNode->elem("i @class=:icon @class=", $element);
        if (isset ($element["name"]))
            $targetNode->elem("span")->content(" " . $element["name"]);
        if (isset ($element["badge"]))
            $targetNode->elem("span @class=badge badge-pill @class=:class", $element["badge"])->content($element["badge"]["content"]);
    }



    public function buildElement(array $element, FHtml $targetNode)
    {
        if (isset($element["children"])) {
            $navLi = $targetNode->elem("li @class={$this->config["li_CssClass"]} {$this->config["li_dropdown_CssClass"]}");
            $navLiA = $navLi->elem("a @class=nav-link @href=:href @data-toggle=dropdown @role=button @aria-haspopup=true @aria-expanded=false", $element);
            $this->buildElementContent($element, $navLiA);

            $dropdownDiv = $navLi->elem("div @class=dropdown-menu {$this->config["menu_css_class"]}");
            foreach ($element["children"] as $curChild) {
                switch ($this->getType($curChild)) {
                    case self::TYPE_HTML:
                        $this->attachHtml($dropdownDiv, $curChild);
                        break;
                    case self::TYPE_ELEMENT:
                        $dropdownA = $dropdownDiv->elem("a @dropdown-item @href=:href", $curChild);
                        $this->buildElementContent($curChild, $dropdownA);
                        break;

                }
            }
        } else {
            $navLi = $targetNode->elem("li @class={$this->config["li_CssClass"]}");
            $navLiA = $navLi->elem("a @class=nav-link @href=:href ", $element);
            $this->buildElementContent($element, $navLiA);


        }



    }

    protected function getType($entry)
    {
        if (isset ($entry["html"])) {
            return self::TYPE_HTML;
        }
        if (isset($entry["href"]))
            return self::TYPE_ELEMENT;
    }

    protected function attachHtml(FHtml $target, $elem)
    {
        if (is_array($elem["html"]))
            return $target->tpl($elem["html"]);
        if (is_string($elem["html"]))
            return $target->content(new RawHtmlNode($elem["html"]));
    }

    public function build(array $elems, FHtml $targetNode, $extraCssClass="")
    {
        $navUl = $targetNode->elem("ul @class={$this->config["ul_CssClass"]} $extraCssClass");
        foreach ($elems as $elem) {
            switch ($this->getType($elem)) {
                case self::TYPE_HTML:
                    $this->attachHtml($navUl, $elem);
                    break;
                    
                case self::TYPE_ELEMENT:
                    $this->buildElement($elem, $navUl);
                    break;
            }
            
        }
    }


}