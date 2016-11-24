<?php

namespace bvanleeuwen1995\labelauty;

use yii\bootstrap\InputWidget;
use yii\helpers\Json;

class Checkbox extends InputWidget {
    /**
     * @var array The client options that will be passed to the LabelAuty widget
     */
    public $clientOptions = [];

    /**
     * @inheritdoc
     */
    public function run() {
        // Register the client script
        $this->_registerClientScript();
    }

    /**
     * Register the client script we need for LabelAuty to function
     */
    private function _registerClientScript() {
        // Get the view
        $oView = $this->getView();

        // Register the asset bundle
        LabelAutyAsset::register($oView);

        // Convert the clientOptions to a JSON string
        $sJsonClientOptions = Json::encode($this->clientOptions);

        // Register the LabelAuty javascript
        $oView->registerJs("$('input[name=\\'{$this->name}\\']').labelauty({$sJsonClientOptions})");
    }


}