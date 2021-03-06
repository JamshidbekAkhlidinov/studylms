<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "rejalar".
 *
 * @property int $id
 * @property string $title
 * @property string $subtitle
 * @property string $img
 * @property string $content
 * @property int $hour
 * @property string $location
 * @property int $user_id
 * @property int $created_at
 */
class Rejalar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rejalar';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
            [['title', 'subtitle', 'img', 'content', 'hour', 'location'], 'required'],
            [['content', 'location'], 'string'],
            [['user_id', 'created_at'], 'integer'],
            [['title', 'subtitle', 'img'], 'string', 'max' => 255],
            // ['hour','datetime'],
            // ['hour', 'datetime', 'format' => 'd-m-y H:i'],

        ];
    }

    const CREATED_REJA = 'created';
    const UPDATED_REJA = 'updated';
    
    public function scenarios()
    {
        return [
            self::CREATED_REJA =>['title', 'subtitle', 'img', 'content', 'hour', 'location'],
            self::UPDATED_REJA =>['title', 'subtitle', 'content', 'hour', 'location'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'img' => 'Img',
            'content' => 'Content',
            'hour' => 'Hour',
            'location' => 'Location',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }
}
