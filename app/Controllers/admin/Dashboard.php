<?php

namespace App\Controllers\admin;

use CodeIgniter\Controller;

class Dashboard extends BaseController
{
    public function index()
    {
        // Render the dashboard view
        return view('pages/admin/dasboard');
    }
}
