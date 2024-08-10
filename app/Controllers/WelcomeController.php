<?php

namespace App\Controllers;

use BrightMoon\Controller;
use BrightMoon\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Trang chính của controller.
     *
     * @param  \BrightMoon\Http\Request  $request
     * @return \BrightMoon\Http\Response
     */
    public function index(Request $request)
    {
        return $this->view(); // view('welcome.index')
    }
}
