<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "upload_file_task".
 *
 * @property integer $id
 * @property integer $id_task
 * @property integer $id_user
 * @property string $filename
 * @property string $uploaded_at
 */
class UploadFileTask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'upload_file_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_task', 'id_user', 'filename', 'uploaded_at'], 'required'],
            [['id_task', 'id_user'], 'integer'],
            [['uploaded_at'], 'safe'],
            [['filename'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_task' => 'Id Task',
            'id_user' => 'Id User',
            'filename' => 'Filename',
            'uploaded_at' => 'Uploaded At',
        ];
    }
}
