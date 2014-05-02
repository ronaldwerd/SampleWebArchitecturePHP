<?php

class Service extends Controller {

    function colors() {
        $colors = Color::findAll();
        return json_encode($colors);
    }

    function votes() {
        $votes = Vote::findAll();
        return json_encode($votes);
    }
}