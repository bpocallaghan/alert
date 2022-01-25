# Alert Box (Laravel)

A helper package to flash a bootstrap alert to the browser via a Facade or a helper function.

```html
<div class="alert alert-info fade in">
	<i class="fa-fw fa fa-smile-o"></i>
	<strong>Title</strong> Description
</div>
```

###Want to see the current package in action, have a look at my starter project.
###[Laravel Starter Project](https://github.com/bpocallaghan/laravel-admin-starter)

## Installation

First, pull in the package through Composer.

```js
"require": {
	"bpocallaghan/alert": "1.*"
}
```
OR
```bash
composer require bpocallaghan/alert
```

Include the service provider within `config\app.php`.

```php
'providers' => [
	Bpocallaghan\Alert\AlertServiceProvider::class,
];
```

Add a facade alias or use the globel helper function `alert()`.

```php
'aliases' => [
	'Alert' => Bpocallaghan\Alert\Facades\Alert::class,
];
```

## Usage

Within any view file.

```html
@include('alert::alert')
```

Within any Controller.

```php
public function index()
{
    // helper function - default to the 'info'
	alert('Title', 'Lorem Ipsum');

	// return object first
	alert()->info('Title', 'Lorem Ipsum');

	// via the facade
    Alert::info('Title', 'Lorem Ipsum');

	return view('home');
}
```

The different 'levels' are:
- `alert()->info('Title', 'Lorem Ipsum');`
- `alert()->success('Title', 'Lorem Ipsum');`
- `alert()->warning('Title', 'Lorem Ipsum');`
- `alert()->danger('Title', 'Lorem Ipsum');`

The different arguments:
- `alert()->info('Title', 'Lorem Ipsum', false);` // without the icon
- `alert()->info('Title', 'Lorem Ipsum', 'smile-o');` // specify the icon class
- `alert()->info('Title', 'Lorem Ipsum', 'smile-o', true);` // limit alert to the request lifecycle
- `alert()->message('Title', 'Lorem Ipsum', 'smile-o', true, 'info');` // specify the type of level
- `alert()->message('Title', 'Lorem Ipsum', 'smile-o', true, 'info', false);` // do not show the 'close'

If you need to modify the view partial, you can run:

```bash
php artisan vendor:publish --provider="Bpocallaghan\Alert\AlertServiceProvider"
```

The view partial can be found here `resources\views\vendor\alert\alert.blade`.

## TODO

- Add an autohide / timeout option

## Tank you

- Thank you [Jeffrey Way](https://github.com/JeffreyWay) for the awesome resources at [Laracasts](https://laracasts.com/).
- Thank you [Taylor Ottwell](https://github.com/taylorotwell) for [Laravel](http://laravel.com/).

- [laracasts/flash](https://github.com/laracasts/flash)
- [Learn exactly how to build this very package on Laracasts!](https://laracasts.com/lessons/flexible-flash-messages)

## Note

Please keep in mind this is for my personal workflow and might not help you.
I developed this to help speed up my day to day workflow. Thank you for understanding.

## My other Packages

- [Laravel custom Generate Files with a config file and publishable stubs](https://github.com/bpocallaghan/generators)
