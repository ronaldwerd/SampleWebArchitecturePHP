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
        switch($this->params[2]) {

            case 'all':
                $votes = Vote::findAll();
                echo json_encode($votes);

                break;

            case 'color':

                if(is_numeric($this->params[3])) {

                    $voteSearch = new Vote();
                    $voteSearch->colorId = $this->params[3];

                    $votes = Vote::findAll($voteSearch);

                    echo json_encode($votes);
                }

                break;
        }
    }
}