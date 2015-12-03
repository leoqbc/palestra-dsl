<?php
/**
 * Created by Leonardo Tumadjian
 * GitHub User: leoqbc
 * Email: tumadjian@gmail.com
 */

namespace Calendar;


class Builder
{
    /**
     * @var Agenda
     */
    protected $agenda; // keep all the appointments inside

    public function __construct(Agenda $agenda)
    {
        $this->agenda = $agenda;
    }

    public static function make()
    {
        return new self(new Agenda);
    }

    public function add($name)
    {
        $this->agenda->addAppointment(Appointment::create());
        $this->current()->setAppointmentName($name);
        return $this;
    }

    /**
     * @return Appointment
     */
    protected function current()
    {
        return $this->agenda->getCurrent();
    }

    public function on($month, $day, $year)
    {
        $this->current()->setDate($month, $day, $year);
        return $this;
    }

    public function from($start)
    {
        $this->current()->setFrom($start);
        return $this;
    }

    public function to($end)
    {
        $this->current()->setTo($end);
        return $this;
    }

    public function getAgenda()
    {
        $agenda = clone $this->agenda;
        $this->agenda->__construct();
        return $agenda;
    }
}