<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "freebies".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $title
 * @property string $filename
 * @property string $description
 */
class Freebies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'freebies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'filename', 'description'], 'required'],
            [['title', 'filename'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_user' => Yii::t('app', 'Id User'),
            'title' => Yii::t('app', 'Judul'),
            'filename' => Yii::t('app', 'Filename'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
