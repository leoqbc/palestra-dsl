<?php
/*
 * Created by Leonardo Tumadjian
 * GitHub User: leoqbc
 * Email: tumadjian@gmail.com
 */

namespace DSLPAL;

use DSLPAL\DSLValidator;

/**
 * Class ValidatorFactory
 * @package DSLPAL
 *
 * @method static DSLValidator notBlank()
 * @method static DSLValidator email()
 * @method static DSLValidator type($type)
 * @method static DSLValidator choice(array $choice)
 * @method static DSLValidator collection(array $choice)
 */
class ValidatorFactory
{
    public static function __callStatic($constraint, $arguments)
    {
        $validator = new DSLValidator;
        return call_user_func_array([$validator, $constraint], $arguments);
    }
}