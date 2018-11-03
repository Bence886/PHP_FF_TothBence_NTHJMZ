<?php
namespace App\Service;


use App\Entity\TreeType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class TreeTypeCrudService extends CrudService implements ITreeTypeCrudService
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
    public function getAllTreeTypes()
    {
        // TODO: Implement getAllTreeTypes() method.
    }

    /**
     * @inheritDoc
     */
    public function getTreeTypeByName($name)
    {
        // TODO: Implement getTreeTypeByName() method.
    }

    /**
     * @inheritDoc
     */
    public function getTreeTypeById($treeTypeId)
    {
        // TODO: Implement getTreeTypeById() method.
    }

    /**
     * @inheritDoc
     */
    public function saveTreeType($oneTreeType)
    {
        // TODO: Implement saveTreeType() method.
    }

    /**
     * @inheritDoc
     */
    public function removeTreeType($treeTypeId)
    {
        // TODO: Implement removeTreeType() method.
    }

    /**
     * @inheritDoc
     */
    public function getForm($oneTreeType)
    {
        // TODO: Implement getForm() method.
    }

}