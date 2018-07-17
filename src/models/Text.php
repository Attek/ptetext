<?php

namespace attek\text\models;

use attek\text\models\base\TextBase;
use yii\behaviors\SluggableBehavior;

class Text extends TextBase
{

	const ACTIVE = 1;
	const INACTIVE = 2;
	const DELETED = 3;


	public static function statusLabels()
	{
		return [
			self::ACTIVE => 'Aktív',
			self::INACTIVE => 'Inaktív',
			self::DELETED => 'Törölt',
		];
	}

	public function getStatus()
	{
		return $this->status == null ? null : self::statusLabels()[$this->status];
	}


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

	public function getStatusForStyle()
	{
		if ($this->status == self::INACTIVE) return "warning text-warning ";
		else if ($this->status == self::DELETED) return "danger text-danger ";
		else if (method_exists($this, 'hasImportError') && $this->hasImportError()) return "warning text-warning ";
		else return "";
	}

}
