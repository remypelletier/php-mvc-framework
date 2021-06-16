<?php

namespace app\core\form;

use app\core\form\Field;
use app\core\Model;

/**
 * Class Form
 * 
 * @author Rémy Pelletier <remypelletier2@gmail.com>
 * @package app\core\form
 */
class Form
{
    public static function begin(string $action, string $method)
    {
        echo sprintf('<form action="%s" method="%s">', $action, $method);
        return new Form();
    }

    public static function end()
    {
        return '</form>';
    }

    public function field(Model $model, string $attribute)
    {
        return new Field($model, $attribute);
    }
}