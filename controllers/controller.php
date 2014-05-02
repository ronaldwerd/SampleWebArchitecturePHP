<?php

abstract class Controller
{
    private $smarty;
    protected $params;
    protected $layout;

    public $isSSL = false;

    public function __construct()
    {
        /*
         * This is very handy if you want to force SSL on only for specific sections of your website.
         */

        if(defined('PRODUCTION') && PRODUCTION == true) {

            if(strncmp($_SERVER["HTTP_HOST"],'www',3) != 0) {
                $_SERVER["HTTP_HOST"] = 'www.'.$_SERVER["HTTP_HOST"];
            }

            if($this->isSSL == true) {
                if($_SERVER["HTTPS"] != "on")
                {
                    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
                    exit();
                }
            } else {
                if($_SERVER["HTTPS"] == "on")
                {
                    header("Location: http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
                    exit();
                }
            }
        }

        $this->smarty = new Smarty();
        $this->smarty->template_dir = APP_ROOT . '/views/';
        $this->smarty->compile_dir = APP_ROOT . '/templates_c/';
        $this->smarty->config_dir = APP_ROOT . '/config/';

        $this->smarty->assign('SESSION', $_SESSION);
        $this->smarty->assign('SCRIPT_URL', $_SERVER['REQUEST_URI']);
    }

    protected function assignVars($vars)
    {
        if(!empty($vars)) {
            foreach($vars as $k => $v) {
                $this->assign($k, $v);
            }
        }
    }

    public function setParams($params)
    {
        $this->params = $params;
    }

    protected function assign($k, $v)
    {
        $this->smarty->assign($k, $v);
    }

    private function viewRender($view, $data = null)
    {
        $file = APP_ROOT . '/views/' . $view . '.tpl';

        if (is_file($file)) {

            if (is_array($data)) {
                foreach ($data as $k => $v) {
                    $this->smarty->assign($k, $v);
                }
            }

            $contents = $this->smarty->fetch($file);

        } else {
            throw new Exception("View " . $file . " not found.");
        }

        return $contents;
    }

    protected function viewRenderContents($view, $data = null)
    {
        return $this->viewRender($view, $data);
    }

    protected function view($view, $data = null)
    {
        echo $this->viewRender($view, $data);
    }

    public function showView()
    {
        if(isset($this->layout)) {
            $this->view($this->layout);
        }
    }
}