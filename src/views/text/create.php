<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model attek\text\models\Text */

$this->title = Yii::t('app', 'Create Text');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Texts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-create">

    <h1 class="page-title txt-color-blueDark">
        <i class="fa-fw fa fa-keyboard-o"></i>
        <?= Html::encode($this->title) ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
