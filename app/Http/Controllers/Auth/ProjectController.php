<?php

namespace App\Http\Controllers;


class ProjectController extends Controller
 {

    /**
    * Responds to requests to GET /books
    */
    public function getShow() {
        return view('home');
    }
}