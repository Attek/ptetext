<?php
use \yii\bootstrap\Modal;
?>
<?php Modal::begin([
    'id' => 'activity-modal',
    'header' => '<h4 class="modal-title"></h4>',
    'footer' => '<a href="#" class="btn btn-primary" data-dismiss="modal">' . Yii::t('app', 'Close') . '</a>',

]); ?>
<?php Modal::end(); ?>

<?php Modal::begin([
    'id' => 'delete-modal',
    'header' => '<h4 class="modal-title">' . Yii::t('app', 'Are you sure') . '</h4>',
    'footer' => '<button type="button" class="btn btn-primary" data-dismiss="modal" id="delete-confirm">' . Yii::t('app', 'Yes') . '</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" id="delete-cancel">' . Yii::t('app', 'No') . '</button>',

]); ?>
<?php Modal::end(); ?>

<?php Modal::begin([
    'id' => 'error-modal',
    'header' => '<h4 class="modal-title">' . Yii::t('app', 'Error') . '</h4>',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal" id="error-close">' . Yii::t('app', 'Close') . '</button>',

]); ?>
<?php Modal::end(); ?>

<?php
$this->registerJsFile("js/modal.view.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
?>