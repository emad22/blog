<?php

namespace System;

class File
{
     /**
     * Directory Separator
     *
     * @const string
     */
    const DS = DIRECTORY_SEPARATOR;

     /**
     * Root Path
     *
     * @var string
     */
    private $root;  // C:\wamp64\www\blog-zohdy

     /**
     * Constructor
     *
     * @param string $root
     */
    public function __construct($root)
    {
        $this->root = $root;
        //$this->root = C:\wamp64\www\blog-zohdy;
    }

     /**
     * Determine wether the given file path exists
     *
     * @param string $file
     * @return bool
     */
    public function exists($file)
    {
        return file_exists($this->to($file));
    }

     /**
     * Require The given file
     *
     * @param string $file
     * @return mixed
     */
    public function call($file)  // $file = 'App/routes.php'
    {
        return require $this->to($file);
    }

     /**
     * Generate full path to the given path in vendor folder
     *
     * @param string $path
     * @return string
     */
    public function toVendor($path)
    {
        return $this->to('vendor/' . $path);
    }

     /**
     * Generate full path to the given path in public folder
     *
     * @param string $path
     * @return string
     */
    public function toPublic($path)
    {
        return $this->to('public/' . $path);
    }

   /**
   * Generate full path to the given path
   *
   * @param string $path
   * @return string
   */
  public function to($path) // App/routes.php
  {
      return $this->root . static::DS . str_replace(['/', '\\'], static::DS, $path);
      // return  C:\wamp64\www\blog-zohdy\App\routes.php
  }
}