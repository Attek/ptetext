<?php

namespace attek\text\models\base;

use app\models\User;
use Yii;
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
 * @property User $crUser
 * @property User $modUser
 */
class TextBase extends ActiveRecordStatus
{
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
            [['cr_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['cr_user' => 'id']],
            [['mod_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['mod_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'title' => Yii::t('app', 'Title'),
            'slug' => Yii::t('app', 'Slug'),
            'text' => Yii::t('app', 'Text'),
            'cr_user' => Yii::t('app', 'Creation user'),
            'cr_date' => Yii::t('app', 'Creation time'),
            'mod_user' => Yii::t('app', 'Modification user'),
            'mod_date' => Yii::t('app', 'Modification time'),
            'status' => Yii::t('app', 'Status'),
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
}