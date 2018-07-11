<?php

use yii\widgets\DetailView;
?>

<div class="well">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title:html',
            'slug',
            'text:html',
            [
                'label' => Yii::t('app', 'Creation user'),
                'value' => $model->crUser != null ? $model->crUser->getName() : null,
            ],
            'cr_date',
            [
                'label' => Yii::t('app', 'Modification user'),
                'value' => $model->modUser != null ? $model->modUser->getName() : null,
            ],
            'mod_date',
            [
                'label' => Yii::t('app', 'Status'),
                'value' => $model->getStatus(),
            ],
        ],
    ]);
?>
</div>
