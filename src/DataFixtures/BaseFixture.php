<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

abstract class BaseFixture extends Fixture


{

    /** @var ObjectManager */
    private $manager;

    /** @var Generator */
    protected $faker;

    abstract protected function loadData();
    public function load(objectManager $manager)
    {
        $this->manager = $manager;
        $this->faker = Factory::create('fr_FR');
        $this->loadData();
        $this->manager->flush();
    }

/**
 * @param int $count
 * @param collable $factory
 */
protected function createMany(int $count, callable $factory){
 
    for ($i=0; $i < $count; $i++) { 
        $entity = $factory();

        if($entity === null){
            throw new \LogicException('L\'Entité doit être retournée');        
        }

        $this->manager->persist($entity);
    }






}









}
