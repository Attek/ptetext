<?php

namespace attek\text\models;

use app\models\User;
use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\SluggableBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "text".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $text
 * @property integer $cr_user
 * @property string $cr_date
 * @property integer $mod_user
 * @property string $mod_date
 * @property integer $status
 *
 */
class Text extends ActiveRecord
{

	const ACTIVE = 1;
	const INACTIVE = 2;
	const DELETED = 3;


	public static function statusLabels()
	{
		return [
			self::ACTIVE => Yii::t('pte-text', 'Active'),
			self::INACTIVE => Yii::t('pte-text', 'Inactive'),
			self::DELETED => Yii::t('pte-text', 'Deleted'),
		];
	}

	public function getStatus()
	{
		return $this->status == null ? null : self::statusLabels()[$this->status];
	}

	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'text';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug'], 'required'],
            [['text'], 'string'],
            [['cr_user', 'mod_user', 'status'], 'integer'],
            [['cr_date', 'mod_date'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('pte-text', 'Id'),
            'title' => Yii::t('pte-text', 'Title'),
            'slug' => Yii::t('pte-text', 'Slug'),
            'text' => Yii::t('pte-text', 'Text'),
            'cr_user' => Yii::t('pte-text', 'Creation user'),
            'cr_date' => Yii::t('pte-text', 'Creation time'),
            'mod_user' => Yii::t('pte-text', 'Modification user'),
            'mod_date' => Yii::t('pte-text', 'Modification time'),
            'status' => Yii::t('pte-text', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCrUser()
    {
        return $this->hasOne(User::className(), ['id' => 'cr_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModUser()
    {
        return $this->hasOne(User::className(), ['id' => 'mod_user']);
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
		else return "";
	}

	public function beforeSave( $insert ) {
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				if ($this->cr_date == null) $this->cr_date = new Expression('NOW()');
				$this->cr_user = Yii::$app->user->id;

			} else {
				$this->mod_date = new Expression('NOW()');
				$this->mod_user = Yii::$app->user->id;
			}
			return true;
		} else {
			return false;
		}
	}
}