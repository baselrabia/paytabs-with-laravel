[![Issues](https://img.shields.io/github/issues/baselrabia/paytabs-with-laravel.svg?style=flat-square)](https://github.com/baselrabia/paytabs-with-laravel/issues)
[![Stars](https://img.shields.io/github/stars/baselrabia/paytabs-with-laravel.svg?style=flat-square)](https://github.com/baselrabia/paytabs-with-laravel/stargazers)
[![Latest Version](https://img.shields.io/github/tag/baselrabia/paytabs-with-laravel.svg?style=flat-square&label=release)](https://github.com/baselrabia/paytabs-with-laravel/tags)
[![Software License](https://img.shields.io/github/license/baselrabia/paytabs-with-laravel.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/baselrabia/paytabs-with-laravel.svg?style=flat-square)](https://packagist.org/packages/baselrabia/paytabs-with-laravel)

<p align="center">
	<img src='https://www.paytabs.com/seals/03.png' width="14%" alt="paytabs Logo"/>
</p>	
<p align="center">
      <img src="https://user-images.githubusercontent.com/59374587/95769432-3c361a00-0c8e-11eb-8ce7-9ee9a66f32af.png" width="10%" alt="Happy Logo"/>
</p>

<h1 align="center">Paytabs With Laravel🥳</h1>


## Installation
Begin by installing this package through Composer. Just run following command to terminal-

```php
composer require baselrabia/paytabs-with-laravel
```

Once this operation completes the package will automatically be discovered for **Laravel 5.6 and above**,

- Run this line to publish package files in your app

```php
php artisan vendor:publish --provider="Basel\Paytabs\PaytabsServiceProvider"
```
- after that fire the migration command

```php
php artisan migrate
```
- last step add those two fields in your `.env` file ,edit it's value with your own 

```php
merchant_email=**************@gmail.com
merchant_secretKey=****************************************************************
```
And make sure to change your `APP_URL` 
```php
APP_URL=http://localhost:8000
```
Otherwise, the final step is to add the service provider. Open `config/app.php`, and add a new item to the providers array.
```php
'providers' => [
	...
	Basel\Paytabs\PaytabsServiceProvider::class,
],
```

- Now add the Aliase

```php
'aliases' => [
	...
	'Paytabs' => Basel\Paytabs\Facades\PaytabsFacade::class,

],

```
## what's happining there:
the package publish 3 files 
```php
1- App/Http/Controllers/PaytabsController.php
2- App/Models/PaytabsInvoice.php
3- config/paytabs.php
```
- you are free to change what you want in the logic of these files {{ Without Deleteing 🧐}}
- the result of success payment will process making a paytabs invoice through the model `App/Models/PaytabsInvoice.php`
- the config file have differnt values for response languague, currancy, email and secert_key

### the package has 2 routes 
### Create Payment Page:
```php
http://localhost:8000/paytabs_payment
```
which call the function ( `PaytabsController@index` ) by GET Request

### Verify Payment:
```php
http://localhost:8000/paytabs_response
```
the return response from paytabs which call the function ( `PaytabsController@response` ) by Post Request

## test card:

### Checkout Process Demo

Please use these ‘test card’ details for your demo

```php

Name on Card:  John Doe
Card Number:  4000 0000 0000 0051
Expiry:  02/22  CVV:  111
```

the link for any updates => 
https://site.paytabs.com/en/checkout-process-demo/


# Contributing
If you think something important is missing or should be different based on your experience, I'd love to hear it!  If you have suggestions for improving this package, open an issue with your suggestion.

 


<h2 align="center">How to Contribute 💪</h2>

   ```
   - Fork the project 

   - Create a new branch with your changes:
   $ git checkout -b my-feature

   - Save your changes and create a commit message telling you what you did:
   $ git commit -m "feature: My new feature"

   - Submit your changes:
   $ git push origin my-feature
   ```


<h2 align="center">License 📝</h2>

<p align="center">
   This repository is under MIT license. You can see the <a href="https://github.com/baselrabia/paytabs-with-laravel/blob/master/LICENSE.TXT">LICENSE</a> file for more details. 😉
</p>

---

 
   >This project was developed with ❤️ by **[@Basel Rabia](https://www.linkedin.com/in/baselrabia/)** <br> 
   If it helped you, give it ⭐, it will help me too 😉 

 

   <div align="center">

   [![Linkedin Badge](https://img.shields.io/badge/-Basel%20Rabia-292929?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/baselrabia/)](https://www.linkedin.com/in/baselrabia/)

   </div>
   
