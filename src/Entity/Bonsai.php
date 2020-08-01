<?php

namespace BonsaiProject\Entity;

class Bonsai
{
    protected $type;

    protected $status;

    protected $wateringFrequency;

    protected $lastCompost;

    public function __construct(string $type)
    {
        $this->type = $type;        
    }

    public function watering()
    {
        $this->status = 'watering';
    }

    public function composting()
    {
        $this->status = 'composting';
    }

    public function transplanting()
    {
        $this->status = 'transplanting';
    }

    public function withFrequentWatering()
    {
        $this->wateringFrequency = 'frecuente';

        return $this;
    }

    public function withVeryFrequentWatering()
    {
        $this->wateringFrequency = 'muy frecuente';

        return $this;
    }

    public function withInfrequentWatering()
    {
        $this->wateringFrequency = 'poco frecuente';

        return $this;
    }

    public function withtLastCompost(string $month)
    {
        $this->lastCompost = $month;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getWateringFrequency()
    {
        return $this->wateringFrequency;
    }

    public function getLastCompost()
    {
        return $this->lastCompost;
    }
}
