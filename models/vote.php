<?php

class Vote extends DBModel
{
    protected $primaryKey = 'id';
    protected $table = 'vote';

    public $id;
    public $cityName;
    public $colorId;
    public $voteCount;

    /*
     * The datamap maps database table columns to class members.
     * Created on and updated values are automatically changed appropriately when a record is created or
     * is updated through DBModel
     */

    protected $dataMap = array(
        'id' => 'id',
        'city_name' => 'cityName',
        'color_id' => 'colorId',
        'vote_count' => 'voteCount');
}