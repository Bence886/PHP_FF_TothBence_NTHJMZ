<?php
namespace App\Service;


use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;

abstract class CrudService
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
     * CrudService constructor.
     * @param EntityManager $em
     * @param FormFactory $formFactory
     * @param Request $request
     */
    public function __construct(EntityManager $em, FormFactory $formFactory, Request $request)
    {
        $this->em = $em;
        $this->formFactory = $formFactory;
        $this->request = $request;
    }

    public abstract function getRepo();
}