<?php
namespace App\Service;


use App\Entity\TreeType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TreeTypeCrudService extends CrudService implements ITreeTypeCrudService
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
        return $this->em->getRepository(TreeType::class);
    }

    /**
     * @inheritDoc
     */
    public function getAllTreeTypes()
    {
        return $this->getRepo()->findAll();
    }

    /**
     * @inheritDoc
     */
    public function getTreeTypeByName($name)
    {
        $this->getRepo()->findBy(["tree_type_name"=>$name]);
    }

    /**
     * @inheritDoc
     */
    public function getTreeTypeById($treeTypeId)
    {
        $oneTT = $this->getRepo()->find($treeTypeId);
        if ($oneTT==null)
        {
            throw new NotFoundHttpException("NO TREETYPE");
        }
        return $oneTT;
    }

    /**
     * @inheritDoc
     */
    public function saveTreeType($oneTreeType)
    {
        $this->em->persist($oneTreeType);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function removeTreeType($treeTypeId)
    {
        $oneTT = $this->getTreeTypeById($treeTypeId);
        $this->em->remove(oneTT);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function getForm($oneTreeType)
    {
        // TODO: Implement getForm() method.
    }

}