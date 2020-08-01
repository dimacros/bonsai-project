<?php

namespace BonsaiProject\Factory;

use BonsaiProject\Entity\Bonsai;
use BonsaiProject\Entity\OlmoBonsai;

final class BonsaiFactory
{
    private const MANZANO_BONSAI = 'Manzano';
    private const OLMO_BONSAI = 'Olmo';
    private const FICUS_BONSAI = 'Ficus';
    private const OLIVO_BONSAI = 'Olivo';

    public static function create(string $type)
    {
        switch ($type) {
            case self::MANZANO_BONSAI:
                return (new Bonsai($type))->withFrequentWatering();
            case self::FICUS_BONSAI:
            case self::OLIVO_BONSAI:
                return (new Bonsai($type))->withInfrequentWatering();
            case self::OLMO_BONSAI:
                return new OlmoBonsai();
            default:
                throw new \InvalidArgumentException('Bonsai type not supported.');
        }
    }
}
