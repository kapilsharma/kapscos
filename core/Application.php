<?php
/**
 * KAPsCos Application
 */

namespace Kapscos;

use Symfony\Component\HttpFoundation\Request;

class Application
{

    private static $_instance;
    private $_request;

    private function __construct()
    {
        $this->initialize();
    }

    public static function getApplication()
    {
        if (null === Application::$_instance) {
            Application::$_instance = new Application();
        }

        return Application::$_instance;
    }

    private function initialize()
    {
        $this->makeRequest();
    }

    private function makeRequest()
    {
        $this->_request = Request::createFromGlobals();
    }

    public function getRequest()
    {
        return $this->_request;
    }
}