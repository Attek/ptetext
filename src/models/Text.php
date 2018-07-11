<?php

namespace attek\text\models;

use app\models\base\TextBase;
use yii\behaviors\SluggableBehavior;

class Text extends TextBase
{

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                // 'slugAttribute' => 'slug', //isn't needed since our column is called
                'ensureUnique' => true,
            ],
        ];
    }

}
