<?php

namespace App\DataFixtures;

use App\Entity\FormWidget;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FormWidgetFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $formWidget = new FormWidget(TextType::class);
        $manager->persist($formWidget);

        $manager->flush();
    }
}
