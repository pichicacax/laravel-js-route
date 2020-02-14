# Laravel JS Routes
Convert all your routes and enable named route usage in the front-end.

## Laravel Support
Compatible with Laravel 6.x, 5.8, and 5.7.

## Installation
1.  Install via Composer  

```
composer require pichicacax/laravel-js-route
```

2. Add the following service provider to your **config/app.php** file

```php
Pichicacax\LaravelJsRoute\LaravelJsRouteServiceProvider::class
```
	 
## Usage

### Generating routes for JS
```
php artisan route:js
```

By default, the JS target is **resources/assets/js/routes.js**. You may change this by providing a custom target

```
php artisan route:js /path/custom-target.js
```

### JS usage

```javascript
import {route} from './routes';
```  

Generate a URL using a named route  

```javascript
route("welcome")
```

Providing parameters  

```javascript
route("foo.edit", fooId)
```  

```javascript
route("bar.index", {
	param1: value1, 
	param2: value2
})
```






