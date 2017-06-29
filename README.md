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
"cyberinferno/yii2-phpdotenv": "~2.0.0"
```

to the require section of your composer.json.


Configuration
-------------

Usage:

```php
return [
    //....
    'bootstrap' => [
        [
            'class' => 'cyberinferno\yii\phpdotenv\Loader',
            'path' => '@vendor/../', // Directory of the .env file 
            'file' => '.env', // Optional parameter if custom environment variable file
            'overload' => false, // Optional parameter whether to overload already existing environment variables. Defaults to false
        ],
    ]
];
```
To use components which will access environment variables extend Loader class like this:

```php
<?php

namespace common\components;

use cyberinferno\yii\phpdotenv\Loader;
use yii\helpers\ArrayHelper;

class PhpdotenvLoader extends Loader
{
    public function bootstrap($app)
    {
        parent::bootstrap($app);
        $app->setComponents(ArrayHelper::merge($app->getComponents(),
            [
                'db' => [
                    'class' => 'yii\db\Connection',
                    'dsn' => getenv('DB_DSN'),
                    'username' => getenv('DB_USERNAME'),
                    'password' => getenv('DB_PASSWORD'),
                    'charset' => 'utf8',
                ],
            ]
        ));
    }
}
```

Bootstrap this class in your config like this:

```php
return [
    //....
    'bootstrap' => [
        [
            'class' => 'common\components\PhpdotenvLoader'
        ],
    ]
];
```

This extension was tested to be working well with [Yii2 Advanced Template](https://github.com/yiisoft/yii2-app-advanced)  
but can be used in any Yii2 application by sending proper .env file path while bootstrapping the extension.