<?php

namespace App\Controllers\Admin;

use System\Controller;

class DashboardController extends Controller
{
     /**
     * Display Dashboard Page
     *
     * @return mixed
     */
    public function index()
    {
        // $this->html->setTitle('Dashboard | Blog');
        // return $this->view->render('admin/main/dashboard');

        $view = $this->view->render('admin/main/dashboard');

        return $this->adminLayout->render($view);
    }
}