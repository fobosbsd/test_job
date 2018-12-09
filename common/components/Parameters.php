<?php

namespace common\components;

use Yii,
    yii\base\Component,
    yii\helpers\ArrayHelper,
    yii\helpers\Json;
use common\models\Settings;

/**
 * Class SluggableBehavior
 * @package app\components
 * @author  Artem Voitko <r3verser@gmail.com>
 *
 */
class Parameters extends Component {

    // Set preload actions
    public function init() {
        parent::init();
    }

    // Set parameter
    public function set($name, $value = null) {
        $model = new Settings();
        $model->p_name = $name;
        $model->p_value = $value;
        if (!$model->save()) {
            $error = (array) $model->getErrors();
            Yii::app()->user->setFlash('error', $error);
            return false;
        } else {
            $this->updateCache();
            return true;
        }
    }

    // Get one parameter
    public function get($name) {
        $p_name = strip_tags(trim($name)); // Security data

        $parapeters = $this->getCache();
        return $parapeters[$p_name];
    }

    // Get all parameters
    public function getAll() {
        $parapeters = $this->getCache();
        return $parapeters;
    }

    // Upgrade cache of parameters
    public function updateCache() {
        $data = ArrayHelper::map(Settings::find()->asArray()->all(), 'p_name', 'p_value');
        Yii::$app->redis->executeCommand('SET', ['parameters', Json::encode($data), 'EX', 4200]);
    }

    // Get parameters from cache
    protected function getCache() {
        //Yii::$app->redis->executeCommand('FLUSHALL');
        $data = Yii::$app->redis->executeCommand('GET', ['parameters']); // Get parameters from redis
        // If no parameters in redis set parameters and get it
        if (!isset($data)) {
            $this->updateCache();
            $data = Yii::$app->redis->executeCommand('GET', ['parameters']);
        }

        return Json::decode($data);
    }

}
