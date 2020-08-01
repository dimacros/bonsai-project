<?php

namespace BonsaiProject\Spec\Factory;

use BonsaiProject\Entity\OlmoBonsai;
use BonsaiProject\Factory\BonsaiFactory;

describe('BonsaiFactory', function() {
    describe('create', function () {

        it('return "Manzano" type and default watering frequency', function () {
            $bonsai = BonsaiFactory::create('Manzano');

            expect($bonsai->getType())->toBe('Manzano');
            expect($bonsai->getWateringFrequency())->toBe('frecuente');
        });

        it('return "Olmo" type and default watering frequency', function () {
            $bonsai = BonsaiFactory::create('Olmo');

            expect($bonsai->getType())->toBe('Olmo');
            expect($bonsai->getWateringFrequency())->toBe('muy frecuente');
        });

        it('return "Olmo" instance', function () {
            $olmoBonsai = BonsaiFactory::create('Olmo');

            expect($olmoBonsai)->toBeAnInstanceOf(OlmoBonsai::class);
        });

        it('return "Ficus" type and default watering frequency', function () {
            $bonsai = BonsaiFactory::create('Ficus');

            expect($bonsai->getType())->toBe('Ficus');
            expect($bonsai->getWateringFrequency())->toBe('poco frecuente');
        });

        it('return "Olivo" type and default watering frequency', function () {
            $bonsai = BonsaiFactory::create('Olivo');

            expect($bonsai->getType())->toBe('Olivo');
            expect($bonsai->getWateringFrequency())->toBe('poco frecuente');
        });
    });
});
