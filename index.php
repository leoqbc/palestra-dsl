<?php
require __DIR__ . '/vendor/autoload.php';

use DSLPAL\DSLValidator;

$fluent = new DSLValidator;

$email = $fluent->length(5, 20)
                ->notBlank()
                ->email()
         ->validate('teste@teste.com');

var_dump($email->validate('leo@teste.com')->count());
var_dump($email->validate('wrongemail')->count());

$constraints = $fluent->collection([
    'nome'  =>  $fluent
                  ->type('string')
                  ->length(5, 10)
                ->end(),
    'email' =>  $fluent
                  ->email()
                ->end(),
    'sexo'  =>  $fluent
                  ->notBlank()
                  ->choice(['M', 'F'])
                  ->optional()
                ->end()
]);

$res = $constraints->validate([
    'nome' => 'Leonardo',
    'email' => 'testeteste.com',
    'sexo' => 'N'
]);

foreach($res as $error) {
    echo $error . '<br>';
}