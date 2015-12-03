<?php
/*
 * Created by Leonardo Tumadjian
 * GitHub User: leoqbc
 * Email: tumadjian@gmail.com
 */
require __DIR__ . '/vendor/autoload.php';

use Calendar\Builder;

$builder = Builder::make();

$builder
    ->add('Dentist')
        ->on(1, 15, 2016)
        ->from('17:00')
        ->to('18:00')
    ->add('Dinner at Tiffani`s')
        ->on(12, 25, 2015)
        ->from('18:00')
        ->to('01:00')
;

var_dump($builder->getAgenda());

// $agenda = $builder->getAgenda();

//$user->setAgenda($agenda);