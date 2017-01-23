<?php


namespace royallib\base\controllers;


use royallib\base\Object;
use royallib\base\Application;
use royallib\base\Request;

/**
 * Class BaseController
 * @package royallib\base\controllers
 *
 *
 * @property Request $request
 */
abstract class BaseController extends Object
{
    protected $_view = 'index';
    /** @var Request $_request */
    private $_request;

    public function __construct()
    {
        $this->_request = Application::$request;
    }

    public function render($view)
    {
        $this->_view = $view;
        return $this->includeView();
    }

    public function redirect($url, $code = 302)
    {
        Application::$request->redirect($url, $code);
    }

    protected function getRequest()
    {
        return $this->_request;
    }

    private function includeView()
    {
        return include_once($this->findView());
    }

    private function findView()
    {
        return Application::basePath() . "/view/{$this->_view}.php";
    }
}
