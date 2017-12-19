<?php

namespace empyrean\worldbuilder;

use Symfony\Component\Finder\Finder;
use empyrean\worldbuilder\everyModel;
use empyrean\worldbuilder\except;

class factoryList
{
    protected $factoryPath;

    protected $userInput;

    protected $everyModel;

    protected $except;

    public function __construct($factoryPath, $userInput)
    {
        $this->factoryPath = $factoryPath;
        $this->userInput = $userInput;
        $this->everyModel = new everyModel();
        $this->except = new except($this->everyModel);
    }

    public function selectMethod()
    {
        if ($this->factoryModels()->first() == "all")
        {           
           return $this->everyModel->get($this->factoryPath);
        }
        
        if($this->factoryModels()->first() != "all" && $this->userInput[1]=="true")
        {
          return  $this->except->get($this->factoryModels());
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