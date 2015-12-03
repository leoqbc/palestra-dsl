<?php
/**
 * Created by Leonardo Tumadjian
 * GitHub User: leoqbc
 * Email: tumadjian@gmail.com
 */

namespace Calendar;

// This class should use Composite Pattern
// to follow the Law of Demeter
class Agenda
{
    /**
     * @var \ArrayIterator
     */
    protected $appointList;

    public function __construct()
    {
        $this->appointList = new \ArrayIterator;
    }

    public function addAppointment($appoint)
    {
        $this->appointList->next();
        $this->appointList->append($appoint);
    }

    public function getCurrent()
    {
        return $this->appointList->current();
    }

    public function getIterator()
    {
        $this->appointList->rewind();
        return $this->appointList;
    }
}