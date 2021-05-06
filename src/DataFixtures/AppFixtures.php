<?php

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_FR');

        for ($i=0; $i < 50; $i++) { 
            $post = new Post();

            $post->setTitle($faker->word())
                ->setContent($faker->paragraph())
                ->setImage($faker->imageUrl($width = 640, $height = 480))
            ;
            
            $manager->persist($post);
        }

        $manager->flush();
    }
}
