<?php

namespace BonsaiProject\Spec\Service;

use BonsaiProject\Service\BonsaiManager;
use BonsaiProject\Factory\BonsaiFactory;
use BonsaiProject\Entity\BonsaiCalendar;

describe('BonsaiManager', function() {
    describe('water', function () {
        it('Olivo return "poco frecuente" in December', function () {
            $manager = new BonsaiManager(new BonsaiCalendar('Diciembre'));
            $bonsai = BonsaiFactory::create('Olivo');

            $manager->water($bonsai);

            expect($bonsai->getWateringFrequency())->toBe('poco frecuente');
        });

        it('Olivo return "muy frecuente" in August', function () {
            $manager = new BonsaiManager(new BonsaiCalendar('Agosto'));
            $bonsai = BonsaiFactory::create('Olivo');

            $manager->water($bonsai);

            expect($bonsai->getWateringFrequency())->toBe('muy frecuente');
        });
    });

    describe('compost', function () {
        it('Bonsai needs compost in Spring', function () {
            $manager = new BonsaiManager(new BonsaiCalendar('Abril'));
            $bonsai = BonsaiFactory::create('Olivo');

            expect($manager->compost($bonsai))->toBe(true);
        });

        it('Bonsai needs compost in Autumn', function () {
            $manager = new BonsaiManager(new BonsaiCalendar('Octubre'));
            $bonsai = BonsaiFactory::create('Olivo');

            expect($manager->compost($bonsai))->toBe(true);
        });

        it('Bonsai not accept compost in the same month', function () {
            $manager = new BonsaiManager(new BonsaiCalendar('Octubre'));
            $bonsai = BonsaiFactory::create('Olivo');
            
            $valid = $manager->compost($bonsai);
            $invalid = $manager->compost($bonsai);

            expect($valid)->toBe(true);
            expect($invalid)->toBe(false);
        });
    });

    describe('transplant', function () {
        it('Bonsai needs transplanting in March', function () {
            $manager = new BonsaiManager(new BonsaiCalendar('Marzo'));
            $bonsai = BonsaiFactory::create('Olivo');

            expect($manager->transplant($bonsai))->toBe(true);
        });

        it('Bonsai does not need to be transplanted in April', function () {
            $manager = new BonsaiManager(new BonsaiCalendar('Abril'));
            $bonsai = BonsaiFactory::create('Olivo');

            expect($manager->transplant($bonsai))->toBe(false);
        });
    });

    describe('pulverize', function () {
        it('Only works with Olmo', function () {
            $manager = new BonsaiManager(new BonsaiCalendar('Diciembre'));
            $bonsai = BonsaiFactory::create('Olmo');

            $manager->water($bonsai);

            expect($bonsai->getStatus())->toBe('watering and spraying');
        });
    });

});