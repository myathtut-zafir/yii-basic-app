<?php

namespace app\components;
class  View extends \yii\web\View
{
    function render($view, $params = [], $context = []): array|string
    {
        return str_ireplace('galic', 'g#%@c', parent::render($view, $params, $context));
    }
}
