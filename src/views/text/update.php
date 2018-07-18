<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model attek\text\models\Text */

$this->title = Yii::t('pte-text', 'Update {modelClass}: ', [
    'modelClass' => 'Text',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('pte-text', 'Texts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('pte-text', 'Update');
?>
<div class="text-update">

    <h1 class="page-title txt-color-blueDark">
        <i class="fa-fw fa fa-keyboard-o"></i>
        <?= Html::encode($this->title) ?>
    </h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
