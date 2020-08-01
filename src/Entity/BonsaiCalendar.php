<?php

namespace BonsaiProject\Entity;

final class BonsaiCalendar
{
    private const MONTHS = [
        'Enero', 
        'Febrero', 
        'Marzo', 
        'Abril', 
        'Mayo', 
        'Junio', 
        'Julio', 
        'Agosto', 
        'Septiembre', 
        'Octubre',
        'Noviembre',
        'Diciembre',
    ];

    private $currentMonth;

    private $springMonths;

    private $summerMonths;

    private $autumnMonths;

    private $winterMonths;

    public function __construct(string $currentMonth)
    {
        $this->setCurrentMonth($currentMonth);
        $this->createDefaultSeasons();    
    }

    private function setCurrentMonth(string $currentMonth)
    {
        if (! in_array($currentMonth, self::MONTHS)) {
            throw new \InvalidArgumentException('Invalid month');
        }

        $this->currentMonth = $currentMonth;
    }

    private function createDefaultSeasons()
    {
        $this->springMonths = ['Marzo', 'Abril', 'Mayo'];
        $this->summerMonths = ['Junio', 'Julio', 'Agosto'];
        $this->autumnMonths = ['Septiembre', 'Octubre', 'Noviembre'];
        $this->winterMonths = ['Diciembre', 'Enero', 'Febrero'];
    }

    public function isMarch()
    {
        return $this->currentMonth === 'Marzo';
    }

    public function isJuly()
    {
        return $this->currentMonth === 'Julio';
    }

    public function isAugust()
    {
        return $this->currentMonth === 'Agosto';
    }

    public function isSpring()
    {
        return in_array($this->currentMonth, $this->springMonths);
    }

    public function isSummer()
    {
        return in_array($this->currentMonth, $this->summerMonths);
    }

    public function isAutumn()
    {
        return in_array($this->currentMonth, $this->autumnMonths);
    }

    public function isWinter()
    {
        return in_array($this->currentMonth, $this->winterMonths);
    }

    public function getCurrentMonth()
    {
        return $this->currentMonth;
    }
}