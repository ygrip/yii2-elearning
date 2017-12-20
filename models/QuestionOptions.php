<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "question_options".
 *
 * @property integer $id
 * @property integer $id_question
 * @property string $option_text
 * @property integer $correct
 * @property string $create_at
 * @property string $update_at
 * @property string $delete_at
 */
class QuestionOptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_question', 'option_text', 'correct'], 'required'],
            [['id_question', 'correct'], 'integer'],
            [['option_text'], 'string'],
            [['create_at', 'update_at', 'delete_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_question' => 'Id Question',
            'option_text' => 'Option Text',
            'correct' => 'Correct',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'delete_at' => 'Delete At',
        ];
    }
}
