<?php

namespace wordpress\mvc_structure\Src;

use wordpress\mvc_structure\Src\Hooks\General;
use wordpress\mvc_structure\Src\Traits\Routes;

abstract class BaseApp
{
    use Routes, General;

    public $app;

    public $namespace;

    public function components(){}

    public function listeners(){}

    public function crons(){}

    public function activation(){}

    public function deactivation(){}

    public function uninstallation(){}

    /**
     * In this method we handle all require variables and methods that exist in the App.php
     * @void It doesn't return anything.
     */
    public function __construct()
    {

        /*
        |--------------------------------------------------------------------------
        | Set the namespace
        |--------------------------------------------------------------------------
        */
        $appNamespace = substr(get_called_class(), 0, strrpos(get_called_class(), "\\"));
        $this->namespace = strtolower(str_replace("\\","/", $appNamespace));

        /*
        |--------------------------------------------------------------------------
        | Init the requires
        |--------------------------------------------------------------------------
        */
        $this->registerRoutes();
        $this->initRquiredMethods();
    }
}