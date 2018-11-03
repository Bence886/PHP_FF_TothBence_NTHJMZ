<?php
namespace App\DTO;

use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\HttpFoundation\Request;

abstract class DTOBase
{
    /**
     * @var FormFactory
     */
    protected $formFactory;

    /**
     * @var Request
     */
    protected $request;

    /**
     * DTOBase constructor.
     * @param FormFactory $formFactory
     * @param Request $request
     */
    public function __construct(FormFactory $formFactory, Request $request)
    {
        $this->formFactory = $formFactory;
        $this->request = $request;
    }

    /**
     * @return FormInterface
     */
    public abstract function getForm();
}