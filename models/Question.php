<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property integer $id
 * @property string $question
 * @property string $question_image
 * @property integer $score
 * @property string $create_at
 * @property string $update_at
 * @property string $delete_at
 * @property integer $id_schedule
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'score', 'id_schedule'], 'required'],
            [['question'], 'string'],
            [['score', 'id_schedule'], 'integer'],
            [['create_at', 'update_at', 'delete_at'], 'safe'],
            [['question_image'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question' => 'Question',
            'question_image' => 'Question Image',
            'score' => 'Score',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'delete_at' => 'Delete At',
            'id_schedule' => 'Id Schedule',
        ];
    }
}
