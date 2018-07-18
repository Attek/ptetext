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
                'label' => Yii::t('pte-text', 'Creation user'),
                'value' => $model->crUser != null ? $model->crUser->getName() : null,
            ],
            'cr_date',
            [
                'label' => Yii::t('pte-text', 'Modification user'),
                'value' => $model->modUser != null ? $model->modUser->getName() : null,
            ],
            'mod_date',
            [
                'label' => Yii::t('pte-text', 'Status'),
                'value' => $model->getStatus(),
            ],
        ],
    ]);
?>
</div>
