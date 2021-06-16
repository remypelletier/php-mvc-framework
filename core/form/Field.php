<?php

namespace app\core\form;

use app\core\Model;

/**
 * Class Field
 * 
 * @author Rémy Pelletier <remypelletier2@gmail.com>
 * @package app\core\form
 */
class Field
{

    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_NUMBER = 'number';
    public const TYPE_EMAIL = 'email';

    public Model $model;
    public string $attribute;
    public string $type;

    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }
    
    public function __toString()
    {
        return sprintf('
            <p class="form-field">
                <label class="form-field__label" for="%1$s">%1$s</label>
                <input class="form-field__input %3$s" value="%2$s" type="%5$s" name="%1$s" id="%1$s">
                <span class="form-field__invalid-feedback">
                    %4$s
                </span>
            </p>
        ',  $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? 'form-field__is-invalid' : '',
            $this->model->getFirstError($this->attribute),
            $this->type);
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
    public function numberField()
    {
        $this->type = self::TYPE_NUMBER;
        return $this;
    }
    public function emailField()
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

}