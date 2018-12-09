<?php

namespace backend\widgets;

use Yii,
    yii\base\Widget,
    yii\helpers\ArrayHelper;

class TxtWidget extends Widget {

    public $headers;

    public function init() {
        if (!isset($this->headers) && !is_array($this->headers)) {
            $this->headers = [];
        }

        parent::init();
    }

    public function run() {

        return $this->render('txt-widget', [
                    'headers' => $this->headers
        ]);
    }

}
