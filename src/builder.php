<?php

namespace empyrean\worldbuilder;

use empyrean\worldbuilder\factoryList;


class builder 
{
    protected $factoryList;

    protected $models;

    public function __construct($factoryList, $models)
    {
         $this->factoryList = $factoryList;
         $this->models = intval($models);   
    }

    public function getModels()
    {
        return $this->models;
    }

    public function getFactoryList()
    {
        return $this->factoryList;
    }

    public function message($factoryModel)
    {
        return $this->models." ".$factoryModel. " models has been succesfully created!";
    }
}