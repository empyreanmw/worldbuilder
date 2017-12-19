<?php

namespace empyrean\worldbuilder\commands;

use Illuminate\Console\Command;


class build extends Command
{
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'wb:create {factories*} {--e|except} {--r|refresh}';
    
        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Create all factory models, or the ones based on yor input.';
    
        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct()
        {
            parent::__construct();
        }
    
        /**
         * Execute the console command.
         *
         * @return mixed
         */
        public function handle()
        {            
            $this->option('refresh') ? $this->withRefresh() : $this->create();           
        }

        public function create()
        {
            $builder = app()->makeWith(
                'wb.builder', 
                [
                    $this->arguments(), 
                    $this->option('except')
                ]
            );  

            foreach ($builder->getFactoryList() as $factoryModel)
            {            
                 factory($factoryModel, $builder->getModels())->create();
                                     
                 $this->info($builder->message($factoryModel));
            }
        }

        public function withRefresh()
        {
            $this->call('migrate:refresh');

            $this->create();
        }
}