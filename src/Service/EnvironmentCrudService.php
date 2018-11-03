<?php
namespace App\Service;


use App\Entity\Environment;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;

class EnvironmentCrudService extends CrudService implements IEnvironmentCrudService
{
    /**
     * @inheritDoc
     */
    public function __construct(EntityManager $em, FormFactory $formFactory, Request $request)
    {
        parent::__construct($em, $formFactory, $request);
    }

    public function getRepo()
    {
        // TODO: Implement getRepo() method.
    }

    /**
     * @inheritDoc
     */
    public function getAllEnvironments()
    {
        // TODO: Implement getAllEnvironments() method.
    }

    /**
     * @inheritDoc
     */
    public function getEnvironmentById($environmentId)
    {
        // TODO: Implement getEnvironmentById() method.
    }

    /**
     * @inheritDoc
     */
    public function getEnvironmentByName($name)
    {
        // TODO: Implement getEnvironmentByName() method.
    }

    /**
     * @inheritDoc
     */
    public function saveEnvironment($oneEnvironment)
    {
        // TODO: Implement saveEnvironment() method.
    }

    /**
     * @inheritDoc
     */
    public function removeEnvironment($environmentId)
    {
        // TODO: Implement removeEnvironment() method.
    }

    /**
     * @inheritDoc
     */
    public function getEnvironmentForm($oneEnvironment)
    {
        // TODO: Implement getEnvironmentForm() method.
    }

}