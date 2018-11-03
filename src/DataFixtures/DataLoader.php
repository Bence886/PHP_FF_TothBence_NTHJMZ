<?php
/**
 * Created by PhpStorm.
 * User: tbenc
 * Date: 2018. 11. 03.
 * Time: 20:32
 */

namespace App\DataFixtures;


use App\Entity\Environment;
use App\Entity\Tree;
use App\Entity\TreeType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Logging\DebugStack;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DataLoader extends Fixture implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;
    /**
     * @var EntityManager
     */
    private $em;
    /**
     * @var string
     */
    private $environment;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $kernel = $this->container->get('kernel');
        if ($kernel) $this->environment = $kernel->getEnvironment();
    }

    public function load(ObjectManager $manager)
    {
        $this->em = $manager;
        $stackLogger = new DebugStack();

        $oak_0_0 = new TreeType();
        $oak_0_0->setTreeTypeName("Oak");
        $oak_0_0->setTreeTypeFileName("oak.xml");
        $oak_0_0->setTreeTypeAge(0);
        $oak_0_0->setTreeTypeLevel(0);
        $oak_0_0->setTreeTypeBranchingType("spiral  ");
        $oak_0_0->setTreeTypeBranchingAngle(60);
        $oak_0_0->setTreeTypeBranchingRoll(45);
        $oak_0_0->setTreeTypeGrowthLen(20);
        $oak_0_0->setTreeTypeGrowthWidth(0.3);
        $oak_0_0->setTreeTypeMinBranchingNum(3);
        $oak_0_0->setTreeTypeMaxBranchingNum(6);

        $this->em->persist($oak_0_0);
        $oak_0_1 = clone $oak_0_0;
        $oak_0_1->setTreeTypeLevel(1);
        $this->em->persist($oak_0_1);
        $this->em->flush();
        echo "\n TREE TYPES OK QUERIES:".count($stackLogger->queries);

        $environment = new Environment();
        $environment->setEnvironmentName("env_0");
        $environment->setEnvironmentFileName("env_0.xml");
        $environment->setEnvironmentAltitude(1500);
        $environment->setEnvironmentRainfall(10);
        $environment->setEnvironmentSoilQuality(5);
        $environment->setEnvironmentWindDirection("0,0,1");
        $environment->setEnvironmentWindStrength(10);

        $this->em->persist($environment);
        $this->em->flush();
        echo "\n ENVIRONMENTS OK QUERIES:".count($stackLogger->queries);

        $tree = new Tree();
        $tree->setTreeName("oak_0");
        $tree->setTreeAge(5);
        $tree->setTreeFileName("oak_0.blend");
        $tree->setTreeResolution(2);
        $tree->setTreeEnvironment($environment);
        $tree->setTreeTreeType($oak_0_0);

        $this->em->persist($tree);
        $this->em->flush();
        echo "\n ENVIRONMENTS OK QUERIES:".count($stackLogger->queries);
    }
}