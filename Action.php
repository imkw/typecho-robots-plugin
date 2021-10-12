<?php

class RobotsTxt_Action implements Widget_Interface_Do {
    protected $response;

    public function __construct()
    {
        $this->response = Typecho_Response::getInstance();
    }


    public function action() {}
    public function execute() {}



    public function _render() {
        $this->response->setContentType("text/plain");

        $robotRules = Helper::options()->plugin('RobotsTxt')->robotRules;

        return htmlspecialchars($robotRules);
    }


    public function render() {
        echo ($this->_render());
    }

}