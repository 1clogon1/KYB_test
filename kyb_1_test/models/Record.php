<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Record model
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 */
class Record extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%records}}';
    }

    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->created_at = time();
        }
        $this->updated_at = time();
        return parent::beforeSave($insert);
    }
}
