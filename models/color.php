<?php

class Color extends DBModel
{
    protected $primaryKey = 'id';
    protected $table = 'color';

    var $id;
    var $colorName;

    /*
     * The datamap maps database table columns to class members.
     * Created on and updated values are automatically changed appropriately when a record is created or
     * updated through DBModel
     */

    protected $dataMap = array(
        'id' => 'id',
        'color_name' => 'colorName');
}