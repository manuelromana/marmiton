<?php
namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
public function load(ObjectManager $manager)
{
$ingredients = array("carotte","farine","beurre","sel","lentilles","miel","curry","eau","vin","sucre");
$i = 0;
foreach($ingredients as &$value){
    $ingredient = new Ingredient();
    $ingredient->setName($value);
    $ingredient->setCode($i);
    $manager->persist($ingredient);
    $i++;
}


$manager->flush();
}
}
