<?php
/*
 * Created by Leonardo Tumadjian
 * GitHub User: leoqbc
 * Email: tumadjian@gmail.com
 */
require __DIR__ . '/vendor/autoload.php';

use Calendar\Agenda;
use Calendar\Appointment;

$agenda = new Agenda;

$appoint = Appointment::create();

$appoint->setAppointmentName('Dentist');
$appoint->setDate(1, 15, 2016);
$appoint->setFrom('17:00');
$appoint->setTo('18:00');

$agenda->addAppointment($appoint);

$appoint = Appointment::create();

$appoint->setAppointmentName('Dinner at Tiffani`s');
$appoint->setDate(12, 25, 2015);
$appoint->setFrom('18:00');
$appoint->setTo('01:00');

$agenda->addAppointment($appoint);

var_dump($agenda);