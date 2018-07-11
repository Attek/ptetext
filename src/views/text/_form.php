<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\CKEditor;
use iutbay\yii2kcfinder\KCFinder;


/* @var $this yii\web\View */
/* @var $model attek\text\models\Text */
/* @var $form yii\widgets\ActiveForm */


$kcfOptions = array_merge(KCFinder::$kcfDefaultOptions, [
    'uploadURL' => Yii::getAlias('@web') . '/upload',
    'access' => [
        'files' => [
            'upload' => true,
            'delete' => true,
            'copy' => false,
            'move' => false,
            'rename' => false,
        ],
        'dirs' => [
            'create' => true,
            'delete' => false,
            'rename' => false,
        ],
        'disabled' => false
    ],
]);

// Set kcfinder session options
Yii::$app->session->set('KCFINDER', $kcfOptions);
?>

<section id="widget-grid" class="text-form">
    <div class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="well" id="role-form">
                <header role="heading">
                    <h2><?= Yii::t('app', 'Text'); ?></h2>
                </header>
                <div class="row">
                    <div role="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-6">

                        <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	                    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
                            'options' => [
                                'rows' => 6,
                            ],
                            'preset' => 'advanced',
                            'clientOptions' => [
                                'resize_enabled' => true,
                                'resize_dir' => 'both',
                                //'skin' => 'bootstrapck'
                                'toolbarGroups' => [
                                    //['name' => 'paragraph', 'groups' => [ 'list', 'indent', 'blocks', 'align' ]],
                                    //['name' => 'clipboard', 'groups' => ['clipboard', 'undo', 'mode']],
                                    ['name' => 'styles', 'groups' => ['styles']],
                                ],
                                'extraAllowedContent' => 'img(*);h3(*);table(class);span(*){*}[*]',
                                //'filebrowserUploadUrl' => 'http://medika.test/upload'
                            ]

	                    ])  ?>


<?php /* echo $form->field($model, 'text')->widget(CKEditor::className(), [
	'editorOptions' => [
		'preset' => 'full',  //basic, standard, full
            'inline' => false,
            'filebrowserBrowseUrl' => 'browse-images',
            'filebrowserUploadUrl' => 'upload-images',
            'extraPlugins' => 'imageuploader',
        ],
    ]); */?>



                        <?= $form->field($model, 'status')->dropDownList(\app\models\base\ActiveRecordStatus::statusLabels()) ?>

                        <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
        </article>
    </div>
</section>