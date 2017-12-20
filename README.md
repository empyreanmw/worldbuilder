# worldbuilder

Worldbuilder is a component that helps you execute all of your factory files with a simple artisan command.

# Installation

Install worldbuilder with composer by running:
```
composer require empyrean/worldbuilder
```
Add a WBServiceProvider to your project's list of providers by pasting this line in your config/app file:
```
empyrean\worldbuilder\providers\WBServiceProvider
```
Publlish a config file by running:
```
php artisan vendor:publish
```

# Usage

To execute all of you factory files run:
```
php artisan wb:create all 
```
To execute specific factory files you need to provide path to the model. You can add as many models as you want, but you need to separate them with a white space:
```
php artisan wb:create 'App\Example' 'App\Example2'
```
In case when you have one or more factory files that you don't want to execute, you can exclude them by adding **-e** The folowing command will execute all of your factory files except the ones you provide as arguemnts:
```
php artisan wb:create 'App\Example' 'App\Example2' -e
```
If you want to refresh your migrations before executing factory files you need to add -r at the end.
```
php artisan wb:create 'App\Example' 'App\Example2' -e -r
```
# Licence

MIT
