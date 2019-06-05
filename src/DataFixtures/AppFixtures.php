<?php
namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
public function load(ObjectManager $manager)
{

$ingredient = new Ingredient();
$ingredient->setName('tomate');
$ingredient->setCode(1);
$manager->persist($ingredient);


$manager->flush();
}
}
