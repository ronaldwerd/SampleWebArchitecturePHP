<?php

class Home extends Controller
{
    public function index()
    {
        $this->view('home/index');
    }

    public function __404()
    {
        echo 'page not found';
    }
}