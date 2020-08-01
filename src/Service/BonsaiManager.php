<?php

namespace BonsaiProject\Service;

use BonsaiProject\Entity\Bonsai;
use BonsaiProject\Entity\BonsaiCalendar;
use BonsaiProject\Entity\OlmoBonsai;

final class BonsaiManager
{
    private $bonsaiCalendar;

    public function __construct(BonsaiCalendar $bonsaiCalendar)
    {
        $this->bonsaiCalendar = $bonsaiCalendar;        
    }

    public function water(Bonsai $bonsai)
    {
        if ($this->bonsaiCalendar->isJuly() || $this->bonsaiCalendar->isAugust()) {
            $bonsai->withVeryFrequentWatering();
        }

        $bonsai->watering();

        /**
         * @var OlmoBonsai $bonsai
         */
        if (get_class($bonsai) === OlmoBonsai::class) {
            $bonsai->spraying();
        }

        return true;
    }

    public function compost(Bonsai $bonsai)
    {
        if ($this->bonsaiCalendar->getCurrentMonth() === $bonsai->getLastCompost()) {
            return false;
        }

        if (! $this->bonsaiCalendar->isSpring() && ! $this->bonsaiCalendar->isAutumn()) {
            return false;
        }

        $bonsai->withtLastCompost($this->bonsaiCalendar->getCurrentMonth());
        $bonsai->composting();

        return true;
    }

    public function transplant(Bonsai $bonsai)
    {
        if (! $this->bonsaiCalendar->isMarch()) {
            return false;
        }

        $bonsai->transplanting();

        return true;
    }
}