<?php

namespace bvanleeuwen1995\labelauty;

use yii\bootstrap\Html;
use yii\bootstrap\InputWidget;
use yii\helpers\Json;

class Checkbox extends InputWidget {
    /**
     * @var array The client options that will be passed to the LabelAuty widget
     */
    public $clientOptions = [];

    public $checked = false;

    /**
     * @inheritdoc
     */
    public function run() {
        // Render the HTML content this extension required
        echo $this->_renderHtmlContent();

        // Register the client script
        $this->_registerClientScript();
    }

    private function _renderHtmlContent() {
        // Set the empty HTML string
        $sHtml = '';

        // Check if we have a model
        if ($this->hasModel()) {
            // Add the Html::activeCheckbox to the HTML string
            $sHtml .= Html::activeCheckbox($this->model, $this->attribute, $this->options);
            // Get the HTML attribute name
            $this->name = Html::getInputName($this->model, $this->attribute);
        } else {
            // Add the HTML::checkBox to the HTML string
            $sHtml .= Html::checkbox($this->name, $this->checked, $this->options);
        }

        // Return the output
        return $sHtml;
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