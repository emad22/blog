<?php
namespace System;

class Loader{
    private $app;
   private $controllers = [];
   private $models = [];

   public function __construct(Application  $app)
   {
        $this->app = $app;
   }

   private function getController($controller)
    {
        return $this->controllers[$controller];
    }
    private function getControllerName($controller)
    {
        $controller .= 'Controller';

        $controller = 'App\\Controllers\\' . $controller;

        return str_replace('/', '\\', $controller);
    }

    //blog/homeController
    public function controller($controller)
    {
        $controller = $this->getControllerName($controller);
// echo $controller;
        if (! $this->hasController($controller)) {
            $this->addController($controller);
        }

        return $this->getController($controller);
    }

    private function hasController($controller)
    {
        return array_key_exists($controller, $this->controllers);
    }
    private function addController($controller)
    {
        $object = new $controller($this->app);

        // App\Controllers\HomeController
        $this->controllers[$controller] = $object;
    }

    public function action($controller, $method, array $arguments = [])
    {
        $object = $this->controller($controller);
        // var_dump(call_user_func_array([$object, $method], $arguments));
        // die;

        return call_user_func_array([$object, $method], $arguments);
    }

    /**
     * Call the given model
     *
     * @param string $model
     * @return object
     */
    public function model($model)
    {
        $model = $this->getModelName($model);

        if (! $this->hasModel($model)) {
            $this->addModel($model);
        }

        return $this->getModel($model);
    }

     /**
     * Determine if the given class|model exists
     * in the models container
     *
     * @param string $model
     * @return bool
     */
    private function hasModel($model)
    {
        return array_key_exists($model, $this->models);
    }

     /**
     * Create new object for the given model and store it
     * in models container
     *
     * @param string $model
     * @return void
     */
    private function addModel($model)
    {
        $object = new $model($this->app);

        // App\Models\HomeModel
        $this->models[$model] = $object;
    }

     /**
     * Get the model object
     *
     * @param string $model
     * @return object
     */
    private function getModel($model)
    {
        return $this->models[$model];
    }

     /**
     * Get the full class name for the given model
     *
     * @param string $model
     * @return string
     */
    private function getModelName($model)
    {
        $model .= 'Model';

        $model = 'App\\Models\\' . $model;

        return str_replace('/', '\\', $model);
    }

}