<?php

namespace BonsaiProject\Entity;

final class OlmoBonsai extends Bonsai
{
    public function __construct()
    {
        parent::__construct('Olmo');
        $this->withVeryFrequentWatering();
    }

    public function spraying()
    {
        if ($this->status) {
            $this->status .= ' and spraying';
            
            return;
        }

        $this->status = 'spraying';
    }
}
