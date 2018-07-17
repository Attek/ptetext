<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel attek\text\models\TextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Texts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-index">

    <h1 class="page-title txt-color-blueDark">
        <i class="fa-fw fa fa-keyboard-o"></i>
        <?= Html::encode($this->title) ?>
    </h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Html::tag('i', '', ['class' => 'fa-fw fa fa-keyboard-o']) . Yii::t('app', 'Create Text'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model, $key, $index) {
            return ['class' => $model->getStatusForStyle() . ($index % 2 == 0 ? "even" : "odd")];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',
            [
                'attribute' => 'cr_user',
                'value' => 'crUser.name',
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>','#', [
                            'title' => Yii::t('yii', 'View'),
                            'class' => 'activity-view-link',
                            'data-id' => $key,
                            'data-url' => $url,
                            'data-title' => Yii::t('app', 'View Text'),
                            'data-pjax' => '0',
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return $model->status != $model::DELETED ?
                            Html::a('<span class="glyphicon glyphicon-trash"></span>','#', [
                                'title' => Yii::t('yii', 'Delete'),
                                'class' => 'activity-delete-link',
                                'data-id' => $key,
                                'data-url' => $url,
                                'data-text' => Yii::t('app', 'To delete {title} text?',
                                    ['title' => $model->title]),
                                'data-pjax' => '0',
                            ]) : '';
                    },
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
<?php
echo $this->render('/layouts/_modals');
?>