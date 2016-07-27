# TemplateEngineBlade

ProcessWire module to add [Laravel's Blade](https://laravel.com/docs/5.1/blade) templating engine to ProcessWire, enforcing MVC and separation of concerns.

Inspired by the wonderful [TemplateEngineFactory](https://github.com/wanze/TemplateEngineFactory) module. Check it out to get more information about the motivations that led me to build this module.

## Requirements

* Composer
* PHP >= 5.6.0
* ProcessWire 3

## Installation

Install the module like any other ProcessWire module. Download the files and place them into the `TemplateEngineBlade` folder inside `site/modules`.

Check out the following guide for more information: [http://modules.processwire.com/install-uninstall/](http://modules.processwire.com/install-uninstall/).

Next you should install the dependencies. Run the following command from the module's folder:

```
composer install
```

## Configuration

* **Path to templates** Path to folder where you want to store your Blade template files.
* **API variable** This is the variable you can use in the controllers (aka ProcessWire templates) to access the template of the current page
* **Template files suffix** The suffix of the template files, default is *blade.php*.
* **Import ProcessWire API variables in Blade templates** If checked, any API variable is accessible inside the Smarty templates, for example *{{ $page }}* refers to the current page.

## Features

All Blade's features are supported:

* Template inheritance
* Sections
* Includes
* Control structures

Under the hood this module uses [Philo's Laravel-Blade package](https://github.com/PhiloNL/Laravel-Blade).

## Usage

The module uses template files under `/site/templates/` as controllers that do the logic, delegating the output/markup to a corresponding view file. The default convention is the same of the `TemplateEngineFactory` module: the view file has the same name as the controller (aka ProcessWire template). If no template file is found, the factory assumes that the controller does not output markup over the template engine. In this case, everything works as normal.

The API variable is an instance of `Illuminate\View\Factory` so you can use [all the methods](https://laravel.com/api/5.1/Illuminate/View/Factory.html) provided by the class. For example, provided that `view` is the name of your API variable configured for the module, you can use:

```
$view->share('foo', 'bar');
```

to add a variable to the environment.

You can also decide to render different files based on some conditions, for example:

```php
// In controller gallery.php

$gallery = $pages->find('...');

$view->share('gallery', $gallery);

if($input->urlSegment1 == 'grid')
{
    return $view->make('gallery.grid', ['title' => 'Display gallery as a grid']);
}
elseif($input->urlSegment1 == 'list')
{
    return $view->make('gallery.list', ['title' => 'Display gallery as a list']);
}

// in every other case it renders the gallery.blade.php view file

```

Note the _dot-notation_ to access files inside a subfolder.

