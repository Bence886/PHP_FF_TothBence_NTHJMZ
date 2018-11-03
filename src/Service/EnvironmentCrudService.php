<?php
namespace App\Service;


use App\Entity\Environment;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EnvironmentCrudService extends CrudService implements IEnvironmentCrudService
{
    public function __construct(EntityManager $em, FormFactory $formFactory, Request $request)
    {
        parent::__construct($em, $formFactory, $request);
    }

    /**
     * @inheritDoc
     */
    public function getRepo()
    {
        return $this->em->getRepository(Environment::class);
    }

    /**
     * @inheritDoc
     */
    public function getAllEnvironments()
    {
        return $this->getRepo()->findAll();
    }

    /**
     * @inheritDoc
     */
    public function getEnvironmentById($environmentId)
    {
        $oneEnv = $this->getRepo()->find($environmentId);
        if ($oneEnv == null)
        {
            throw new NotFoundHttpException("NO ENVIRONMENT");
        }
        return $oneEnv;
    }

    /**
     * @inheritDoc
     */
    public function getEnvironmentByName($name)
    {
        return $this->getRepo()->findBy(["environment_name"=>$name]);
    }

    /**
     * @inheritDoc
     */
    public function saveEnvironment($oneEnvironment)
    {
        $this->em->persist($oneEnvironment);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function removeEnvironment($environmentId)
    {
        $oneEnv = $this->getEnvironmentById($environmentId);
        $this->em->remove($oneEnv);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function getEnvironmentForm($oneEnvironment)
    {
        // TODO: Implement getEnvironmentForm() method.
    }

}