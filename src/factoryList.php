<?php

namespace empyrean\worldbuilder;

use Symfony\Component\Finder\Finder;
use empyrean\worldbuilder\everyModel;
use empyrean\worldbuilder\except;

class factoryList
{
    protected $factoryPath;

    protected $userInput;

    public function __construct($factoryPath, $userInput)
    {
        $this->factoryPath = $factoryPath;
        $this->userInput = $userInput;
    }

    public function selectMethod()
    {
        if ($this->factoryModels()->first() == "all")
        {           
           $everyModel = new everyModel(); 
           return $everyModel->get($this->factoryPath);
        }
        
        if($this->factoryModels()->first() != "all" && $this->userInput[1]=="true")
        {
          $except = new except();
          return  $except->get($this->factoryModels());
        }
        
        if($this->factoryModels()->first() != "all" && $this->userInput[1]!="true")
        {
            return $this->factoryModels();
        }

    }

    protected function factoryModels()
    {
        return collect(
            $this->userInput[0]['factories']
        );
    }


}