<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use attek\text\models\Text;
/* @var $this yii\web\View */
/* @var $searchModel attek\text\models\TextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('pte-text', 'Texts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="text-index">

    <h1 class="page-title txt-color-blueDark">
        <i class="fa-fw fa fa-keyboard-o"></i>
        <?= Html::encode($this->title) ?>
    </h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Html::tag('i', '', ['class' => 'fa-fw fa fa-keyboard-o']) . ' ' . Yii::t('pte-text', 'Create Text'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?php
    try {
	    echo GridView::widget( [
		    'dataProvider' => $dataProvider,
		    'filterModel'  => $searchModel,
		    'rowOptions'   => function ( $model, $key, $index ) {
	            /** @var $model \attek\text\models\Text */
			    return [ 'class' => $model->getStatusForStyle() . ( $index % 2 == 0 ? "even" : "odd" ) ];
		    },
		    'columns'      => [
			    [ 'class' => 'yii\grid\SerialColumn' ],

			    'title',
			    'slug',
			    [
				    'attribute' => 'status',
				    'value' => function($model) {
					    /** @var $model \attek\text\models\Text */
					    return $model->getStatus();
				    },
				    'filter' => Text::statusLabels()
			    ],
			    [
				    'class'    => 'yii\grid\ActionColumn',
				    'template' => '{view} {update} {delete}',
				    'buttons'  => [
					    'view'   => function ( $url, $model, $key ) {
						    return Html::a( '<span class="glyphicon glyphicon-eye-open"></span>', '#', [
							    'title'      => Yii::t( 'yii', 'View' ),
							    'class'      => 'activity-view-link',
							    'data-id'    => $key,
							    'data-url'   => $url,
							    'data-title' => Yii::t( 'pte-text', 'View Text' ),
							    'data-pjax'  => '0',
						    ] );
					    },
					    'delete' => function ( $url, $model, $key ) {
						    return $model->status != $model::DELETED ?
							    Html::a( '<span class="glyphicon glyphicon-trash"></span>', '#', [
								    'title'     => Yii::t( 'yii', 'Delete' ),
								    'class'     => 'activity-delete-link',
								    'data-id'   => $key,
								    'data-url'  => $url,
								    'data-text' => Yii::t( 'pte-text', 'To delete {title} text?',
									    [ 'title' => $model->title ] ),
								    'data-pjax' => '0',
							    ] ) : '';
					    },
				    ],
			    ],
		    ],
	    ] );
    } catch (\Exception $e) {
	    echo Yii::t('pte-text', 'Something went wrong, please try again later!');
	    Yii::error($e->getMessage());
    }
?>
<?php Pjax::end(); ?></div>
<?php
echo $this->render('/layouts/_modals');
?>