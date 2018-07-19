Contextual Text manager for Yii2
--------------------------------
--------------------------------

Installation
------------

### Install With Composer

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require attek/pte-text "*"
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

## Popover for field contextual help
```php
attek\text\assets\HelpAsset::register($this);

...
$form = ActiveForm::begin( 
    [ 'fieldConfig' => [ 'class' => 'attek\text\components\ActiveField' ]
...
 $form->field( $model, 'name' )->textInput()->hint('Text for popup', ['slug' => 'slug-name'])     
...
```


## Popover for contextual help
```php
echo Html::a(Html::tag('i', '', ['class' => 'fa fa-question-circle']), null,
                                ['data-slug' => 'slug-name',  'data-toggle'=> 'popover', 'title' => 'Title for help'])
```                                
