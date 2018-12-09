<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "parameters".
 *
 * @property integer $id
 * @property string $p_name
 * @property string $p_value
 *
 * @property Site $site
 */
class Settings extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'parameters';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['p_name'], 'required'],
            [['p_name'], 'unique'],
            [['p_name'], 'string', 'max' => 255],
            [['p_value'], 'string', 'max' => 5000],
            [['p_name', 'p_value'], 'filter', 'filter' => function($value) {
                    return strip_tags(trim($value));
                }]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('common', 'ID'),
            'p_name' => Yii::t('common', 'Name'),
            'p_value' => Yii::t('common', 'Value'),
        ];
    }

}
