<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class CrudFactory
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var FormFactory
     */
    protected $formFactory;

    /**
     * @var Request
     */
    protected $request;

    /**
     * CrudFactory constructor.
     * @param EntityManager $em
     * @param FormFactory $formFactory
     * @param RequestStack $request
     */
    public function __construct(EntityManager $em, FormFactory $formFactory, RequestStack $request)
    {
        $this->em = $em;
        $this->formFactory = $formFactory;
        $this->request = $request->getCurrentRequest();
    }

    public function getTreeService(): ITreeCrudService
    {
        return new TreeCrudService($this->em, $this->formFactory, $this->request);
    }

    public function getTreeTypeService(): ITreeTypeCrudService
    {
        return new TreeTypeCrudService($this->em, $this->formFactory, $this->request);
    }

    public function getEnvironmentService(): IEnvironmentCrudService
    {
        return new EnvironmentCrudService($this->em, $this->formFactory, $this->request);
    }

    public function getUserService(): IUserCrudService
    {
        return new UserCrudService($this->em, $this->formFactory, $this->request);
    }
}