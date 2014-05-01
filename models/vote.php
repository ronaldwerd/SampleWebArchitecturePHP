<?php

class Vote extends DBModel
{
    protected $primaryKey = 'id';
    protected $table = 'vote';

    var $id;
    var $cityName;
    var $colorId;
    var $voteCount;
    var $createdOn;
    var $updatedOn;

    /*
     * The datamap maps database table columns to class members.
     * Created on and updated values are automatically changed appropriately when a record is created or
     * is updated through DBModel
     */

    public $dataMap = array(
        'id' => 'id',
        'city_name' => 'cityName',
        'color_id' => 'colorId',
        'vote_count' => 'voteCount',
        'created_on' => 'createdOn',
        'updated_on' => 'updatedOn');
}