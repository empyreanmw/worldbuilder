<?php

namespace empyrean\worldbuilder;

use empyrean\worldbuilder\factoryModels;
use Symfony\Component\Finder\Finder;


class everyModel implements factoryModels
{
    protected $factories;

    public function get($factoryPath)
    {
        $finder = new Finder();
        $finder->files()->in($factoryPath);

        foreach($finder as $file)
        {
            $this->factories[] = $this->prepareFactoryName($file->getContents());
        }
        
        return $this->factories;
    }

    public function prepareFactoryName($factory)
    {
       \preg_match('/\((.*?)\:/', $factory, $matches);

       return $matches[1];
    }



}