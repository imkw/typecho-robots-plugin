<?php

/**
 * robots.txt 文件管理
 *
 * @package robots.txt
 * @version 1.0.0
 * @author Laoju Wang
 * @link https://laoju.wang
 */
class RobotsTxt_Plugin implements Typecho_Plugin_Interface {
    public static function activate()
    {
        Helper::addRoute('robots.txt', '/robots.txt', 'RobotsTxt_Action', 'render');

        return _t("Robots.txt 檔案創建成功");
    }

    public static function deactivate()
    {
        // TODO: Implement deactivate() method.
        Helper::removeRoute('robots.txt');
    }

    public static function config(Typecho_Widget_Helper_Form $form)
    {
        $defaultValue = <<<EOT
User-agent: *
Disallow: /
EOT;

        $robotRules = new Typecho_Widget_Helper_Form_Element_Textarea(
            "robotRules",
            NULL,
            $defaultValue,
            _t("robots.txt 規則"),
            sprintf("輸入 robots.txt 文件規則，<a target='_blank' href='%s'>點擊這裡</a> 查看具體規範", "https://moz.com/learn/seo/robotstxt")
        );

        $form->addInput($robotRules->addRule("required", _("必須填入 robots.txt 規則")));
    }

    public static function personalConfig(Typecho_Widget_Helper_Form $form) {}
}