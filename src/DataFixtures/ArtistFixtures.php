<?php

namespace App\DataFixtures;
use App\Entity\Artist;

class ArtistFixtures extends BaseFixture
{
    protected function loadData(){
        $this->createMany(20,'artist' ,function(){
            return (new Artist())

                    ->setName($this->faker->name)
                    ->setDescription($this->faker->optional()->realText())
                    ;
                    
        });

    }

}
