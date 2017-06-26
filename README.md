Phpdotenv extension for Yii 2
===============================================

This is a Yii2 extension for [vulcas/phpdotenv](https://github.com/vlucas/phpdotenv)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require cyberinferno/yii2-phpdotenv
```

or add

```json
"cyberinferno/yii2-phpdotenv": "~1.0.0"
```

to the require section of your composer.json.


Configuration
-------------

Usage:

```php
return [
    //....
    'components' => [
        'dotenv' => [
            'class' => 'cyberinferno\yii\phpdotenv\Loader',
            'file' => '.env', // Optional parameter if custom environment variable directory
            'overload' => false, // Optional parameter whether to overload already existing environment variables. Defaults to false
        ],
    ]
];
```
Accessing ``Dotenv`` object:

```php
$dotenv = \Yii::$app->dotenv->dotenv;
```

For further information about methods available in ``Dotenv`` class refer [Phpdotevn README](https://github.com/vlucas/phpdotenv/blob/master/README.md)