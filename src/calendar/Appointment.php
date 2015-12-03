<?php
/**
 * Created by Leonardo Tumadjian
 * GitHub User: leoqbc
 * Email: tumadjian@gmail.com
 */

namespace Calendar;

class Appointment
{
    protected $name;
    protected $date;
    protected $from;
    protected $to;

    // just to simplify the calls
    // and alway make new obj
    public static function create()
    {
        return new Appointment;
    }

    /**
     * @param mixed $name
     */
    public function setAppointmentName($name)
    {
        $this->name = $name;
    }

    /**
     * @param int $month
     * @param int $day
     * @param int $year
     */
    public function setDate($month, $day, $year)
    {
        $this->date = sprintf('%02d/%02d/%04d', $day, $month, $year);
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @param string $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }
}