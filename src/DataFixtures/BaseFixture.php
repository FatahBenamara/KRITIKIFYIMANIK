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

    /** @var array */
    private $references = [];

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
     * @param string $groupName
     * @param collable $factory
     */
    protected function createMany(int $count, string $groupName, callable $factory){
    
        for ($i=0; $i < $count; $i++) { 
            $entity = $factory();

            if($entity === null){
                throw new \LogicException('L\'Entité doit être retournée');        
            }

            $this->manager->persist($entity);

            $reference = sprintf('%s_%d', $groupName, $i);
            $this->addReference($reference, $entity);

        }
        
    }


    /**
     * @param string $groupName 
     */
    protected function getRandomReference(string $groupName)
    {
        if (!isset($this->references[$groupName])) {
            $this->references[$groupName] = [];

            foreach ($this->referenceRepository->getReferences() as $key => $ref) {
                if (strpos($key, $groupName) === 0) {
                    $this->references[$groupName][] = $key;
                }
            }
        }

        if ($this->references[$groupName] === []) {
            throw new \Exception(sprintf('Aucune référence trouvée pour le groupe "%s"', $groupName));
        }

        $randomReference = $this->faker->randomElement($this->references[$groupName]);
        return $this->getReference($randomReference);
    }


}
