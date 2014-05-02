<?php

class Service extends Controller {

    public function __construct()
    {
        parent::__construct();

        header("Content-type:application/json\n\n");
    }

    public function colors()
    {
        $colors = Color::findAll();
        echo json_encode($colors);
    }

    public function votes()
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