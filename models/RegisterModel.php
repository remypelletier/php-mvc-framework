<?php

namespace app\models;

use app\core\Model;

/**
 * Class RegisterModel
 * 
 * @author Rémy Pelletier <remypelletier2@gmail.com>
 * @package app\models
 */
class RegisterModel extends Model
{
    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';

    public function register()
    {
        echo 'creating user';
    }

    public function rules(): array
    {
        return [
            'firstName' => [self::RULES_REQUIRED],
            'lastName' => [self::RULES_REQUIRED],
            'email' => [self::RULES_REQUIRED, self::RULES_EMAIL],
            'password' => [self::RULES_REQUIRED, [self::RULES_MIN, 'min' => 8], [self::RULES_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULES_REQUIRED, [self::RULES_MATCH, 'match' => 'password']],
        ];
    }
}