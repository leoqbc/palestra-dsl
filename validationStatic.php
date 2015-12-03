<?php
require __DIR__ . '/vendor/autoload.php';

use DSLPAL\ValidatorFactory as dsl;

$const = dsl::collection([
    'nome' => dsl::type('string')
                 ->length(5, 10),

    'email' => dsl::email(),

    'sexo' => dsl::notBlank()
                 ->choice(['M', 'F'])
                 ->optional()
]);

$erros = $const->validate([
    'nome' => 'Leonardo',
    'email' => 'testeteste.com',
    'sexo' => 'N'
]);

foreach ($erros as $erro) {
    echo $erro;
}