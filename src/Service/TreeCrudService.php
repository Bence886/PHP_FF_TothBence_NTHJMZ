<?php
namespace App\Service;


use App\Entity\Tree;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class TreeCrudService extends CrudService implements ITreeCrudService
{
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
    public function getAllTrees()
    {
        // TODO: Implement getAllTrees() method.
    }

    /**
     * @inheritDoc
     */
    public function getTreeById($treeId)
    {
        // TODO: Implement getTreeById() method.
    }

    /**
     * @inheritDoc
     */
    public function getTreesByName($name)
    {
        // TODO: Implement getTreesByName() method.
    }

    /**
     * @inheritDoc
     */
    public function getTreesByTreeType($tree_type_id)
    {
        // TODO: Implement getTreesByTreeType() method.
    }

    /**
     * @inheritDoc
     */
    public function getTreeByEnvironment($environment_id)
    {
        // TODO: Implement getTreeByEnvironment() method.
    }

    /**
     * @inheritDoc
     */
    public function saveTree($oneTree)
    {
        // TODO: Implement saveTree() method.
    }

    /**
     * @inheritDoc
     */
    public function removeTree($treeId)
    {
        // TODO: Implement removeTree() method.
    }

    /**
     * @inheritDoc
     */
    public function getForm($oneTree)
    {
        // TODO: Implement getForm() method.
    }

}