<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $admin = new User();
        $admin->setRoles(['ROLE_USER','ROLE_ADMIN']);
        $admin->setPassword(password_hash('admin', PASSWORD_BCRYPT));
        $admin->setUsername('admin');
        $admin->setFirstname('admin');
        $admin->setLastname('admin');

        $manager->persist($admin);
        $admin = new User();
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword(password_hash('bob', PASSWORD_BCRYPT));
        $admin->setUsername('bob');
        $admin->setFirstname('bob');
        $admin->setLastname('bob');
        $manager->persist($admin);


        $manager->flush();
    }
}
