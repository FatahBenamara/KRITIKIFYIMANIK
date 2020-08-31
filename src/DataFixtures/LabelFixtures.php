<?php

namespace App\DataFixtures;
use App\Entity\Label;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LabelFixtures extends BaseFixture
{
    protected function loadData(){
        $this->createMany(8, 'label',function(){
            return (new Label())

            ->setName($this->faker->lastName . 'Production')
                    ;
        });

    }
}
