Installation
------------

### Install With Composer

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require attek/pte-text "0.0.3"
```

## Database table
yii migrate --migrationPath=@attek/text/migrations

## Usage

Set in config file (web.php)
```php
'modules' => [
    ...
    'text' => [
            'class' => 'attek\text\Module',            
    ]
    ...
]
```