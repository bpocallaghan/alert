# Alert Box (Laravel)

A helper package to flash a bootstrap alert to the browser via a Facade or a helper function.

```html
<div class="alert alert-info fade in">
	<i class="fa-fw fa fa-smile-o"></i>
	<strong>Title</strong> Description
</div>
```

## Installation

First, pull in the package through Composer.

```js
"require": {
	"bpocallaghan/alert": "1.*"
}
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
	'Alert' => 'Bpocallaghan\Alert\Facades\Alert',
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
- `Alert::info('Title', 'Lorem Ipsum');`
- `Alert::success('Title', 'Lorem Ipsum');`
- `Alert::warning('Title', 'Lorem Ipsum');`
- `Alert::error('Title', 'Lorem Ipsum');`

The different arguments:
- `Alert::info('Title', 'Lorem Ipsum', false);` // without the icon
- `Alert::info('Title', 'Lorem Ipsum', 'smile-o');` // specify the icon class
- `Alert::message('Title', 'Lorem Ipsum', 'smile-o', 'info');` // specify the type of level
- `Alert::message('Title', 'Lorem Ipsum', 'smile-o', 'info', false);` // do not show the 'close' button

If you need to modify the view partial, you can run:

```bash
php artisan vendor:publish --provider="Bpocallaghan\Alert\AlertServiceProvider"
```

The view partial can be found here 'resources\views\vendor\alert\alert.blade'.

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

- [Generate Files](https://github.com/bpocallaghan/generators)