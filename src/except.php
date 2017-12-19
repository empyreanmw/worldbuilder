<?php

namespace empyrean\worldbuilder;

use empyrean\worldbuilder\factoryModels;
use empyrean\worldbuilder\everyModel;

class except implements factoryModels
{
    protected $factoryList;

    public function __construct(everyModel $everyModel)
    {
        $this->factoryList = $everyModel->get(config('wb.factoryPath'));
    }

    public function get($userInput)
    {
           foreach($userInput as $factory)
           {
                $key = array_search($factory, $this->factoryList);
                unset($this->factoryList[$key]);  
           }

           return $this->factoryList;
    }
}