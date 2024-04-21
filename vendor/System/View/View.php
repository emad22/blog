<?php

namespace System\View;
use System\File;
class View implements ViewInterface{

     /**
     * File Object
     */
    private $file;

     /**
     * View Path
     */
    private $viewPath;

     /**
     * Passed Data "variables" to the view path
     */
    private $data = [];

     /**
     * The output from the view file
     */
    private $output;

    public function __construct(File $file, $viewPath, array $data)
    {
        $this->file = $file;
        $this->preparePath($viewPath);
        $this->data = $data;
    }

    private function preparePath($viewPath)
    {
        $relativeViewPath = 'App/Views/' . $viewPath . '.php';
        // echo $relativeViewPath;
        $this->viewPath = $this->file->to($relativeViewPath);
        // echo ($this->viewPath);
        // echo $this->viewFileExists($relativeViewPath);
        if (! $this->viewFileExists($relativeViewPath)) {
            die('<b>' . $viewPath . ' View</b>' . ' does not exists in Views Folder');
        }
    }

    private function viewFileExists($viewPath)
    {
        return $this->file->exists($viewPath);
    }

    public function getOutput()
    {
        if (is_null($this->output)) {
            ob_start();

            extract($this->data);

            require $this->viewPath;

            $this->output = ob_get_clean();
        }

        return $this->output;
    }

    public function __toString()
    {
        return $this->getOutput();
    }

}

