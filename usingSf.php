<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

$constraint = [
    new Assert\Length([
        'min' => 5,
        'max' => 20
    ]),
    new Assert\NotBlank,
    new Assert\Email
];

$validator = Validation::createValidator();

$errors1 = $validator->validate('teste@gmail.com', $constraint);
$errors2 = $validator->validate('wrongemail', $constraint);

var_dump($errors1->count());
var_dump($errors2->count());

$constraints = new Assert\Collection([
    'nome' => [
        new Assert\Type('string'),
        new Assert\Length(['min' => 5, 'max' => 10])
    ],
    'email' => [
        new Assert\Email()
    ],
    'sexo' => new Assert\Optional([
        new Assert\NotBlank(),
        new Assert\Choice(['M', 'F'])
    ])
]);

$validator = Validation::createValidator();

$res = $validator->validate([
    'nome' => 'Leonardo',
    'email' => 'teste@teste.com',
    'sexo' => 'N'
], $constraints);


foreach($res as $error) {
    echo $error . '<br>';
}
