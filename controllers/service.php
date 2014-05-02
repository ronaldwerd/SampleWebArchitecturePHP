<?php

class Service extends Controller {

    function __construct()
    {
        header("Content-type:application/json\n\n");
    }

    function colors()
    {
        $colors = Color::findAll();
        echo json_encode($colors);
    }

    function votes()
    {
        $votes = Vote::findAll();
        echo json_encode($votes);
    }
}