# Exemplos palestra DSL
A simple DSL example validator for the symfony/validator component and a sample Calendar DSL

Simple use
```php
use DSLPAL\DSLValidator;

$fluent = new DSLValidator;

$email = $fluent->length(5, 20)
                ->notBlank()
                ->email()
         ->validate('teste@teste.com');

echo $email->count(); // print 0 - no errors
```

Validating colections
```php
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

foreach ($res as $error) {
    echo $error . '<br>';
}
```

And if you like a static simple mode you can call the asserts like this:

```php
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
```