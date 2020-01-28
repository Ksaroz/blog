<?php
namespace HashtagCloudCo\AdminBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\common\Persistence\ObjectManager;
use HashtagCloudCo\AdminBundle\Entity\users;

class LoadDataFixtures extends Fixture{

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $user = new users();

        $user->setUsername('Admin');
        $user->setEmail('saroj@saroj.com');

        $user->setPassword('7029');

        $manager->persist($user);
        $manager->flush();
    }

}

