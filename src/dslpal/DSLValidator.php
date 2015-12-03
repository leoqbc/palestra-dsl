<?php

/*
 * Created by Leonardo Tumadjian
 * GitHub User: leoqbc
 * Email: tumadjian@gmail.com
 */

namespace DSLPAL;

use Symfony\Component\Validator\Validation;

/**
 * Class DSLValidator
 * @package DSLPAL
 *
 * @method DSLValidator notBlank()
 * @method DSLValidator email()
 * @method DSLValidator type($type)
 * @method DSLValidator choice(array $choice)
 */
class DSLValidator
{
    protected $assertList;

    protected $validator;

    const CONSTRAINT_NAMESPACE = 'Symfony\\Component\\Validator\\Constraints\\';

    public function __construct()
    {
        $this->validator = Validation::createValidator();
    }

    public function __call($constraint, $parameters)
    {
        $this->assertList[] = $this->getConstraint($constraint, $parameters);
        return $this;
    }

    public function length($min = null, $max = null)
    {
        $options = [];
        if (null != $min) {
            $options['min'] = $min;
        }
        if (null != $max) {
            $options['max'] = $max;
        }
        return $this->__call(__FUNCTION__, [$options]);
    }

    public function optional()
    {
        $this->assertList = $this->getConstraint(__FUNCTION__, [$this->assertList]);
        return $this;
    }

    public function getConstraint($constraint, $parameters)
    {
        $class = self::CONSTRAINT_NAMESPACE . ucfirst($constraint);
        $refClass = new \ReflectionClass($class);
        return $refClass->newInstanceArgs($parameters);
    }

    public function collection(array $asserts)
    {
        $collection = self::CONSTRAINT_NAMESPACE . 'Collection';
        foreach ($asserts as $field => $assert) {
            $asserts[$field] = $assert instanceof DSLValidator? $assert->getAssertList() : $assert;
        }
        $this->assertList = new $collection($asserts);
        return clone $this;
    }

    public function validate($value)
    {
        $violations = $this->validator->validate($value, $this->assertList);
        return $violations;
    }

    public function getAssertList()
    {
        return $this->assertList;
    }

    public function end()
    {
        $assertList = $this->assertList;
        $this->assertList = null;
        return $assertList;
    }

    public function factory()
    {
        $clone = clone $this;
        $this->end();
        return $clone;
    }
}