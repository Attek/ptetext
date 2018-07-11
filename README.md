# ptesaml
Yii2 Text engine for location-sensitive help

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run
```
    composer require attek/ptetext "1.*" 
```

or add 

```
"attek/ptesaml" : "1.*"
```

or clone form github

```
    git clone https://github.com/Attek/ptesaml
```

## Usage

Set in config file (web.php)
```php
'components' => [
    'saml' => [
            'class' => 'attek\ptesaml\Saml',
            'simpleSamlPath' => '/usr/share/simplesamlphp/',
            'config' => 'default-sp'
    ]
]
```

Use in code
```php
$saml = Yii::$app->saml;
//check is authenticated
$saml->isAuthenticated();
//Login
$saml->requireAuth();
$saml->getAttributes();
$saml->logout();
$saml->getSamlUser();
```
Login button
```
<?php
use attek\ptesaml\SamlAsset;

/* @var yii\web\View $this */
SamlAsset::register($this);
?>
<?= Html::a(Yii::t('app', 'Login'), ['saml'], ['class' => 'btn btn-primary pte-login']) ?>
```