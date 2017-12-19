<?php

namespace empyrean\worldbuilder;

use empyrean\worldbuilder\factoryModels;
use empyrean\worldbuilder\everyModel;

class except implements factoryModels
{
    public function get($factoryList)
    {
        $everyModel = new everyModel(config('wb.factoryPath'));

        foreach($everyModel as $factory)
        {
            $key = array_search($factory, $factoryList);
            unset($factoryList[$key]);
        }

        return $factoryList;
    }
}