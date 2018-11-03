<?php
namespace App\Service;


use App\Entity\TreeType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
        $this->em->remove($oneTT);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function getForm($oneTreeType)
    {
        $form = $this->formFactory->createBuilder(FormType::class, $oneTreeType);

        $form->add("tree_type_name", TextType::class, ["required"=>false]);
        $form->add("tree_type_file_name", TextType::class, ["required"=>false]);
        $form->add("tree_type_branching_type", TextType::class, ["required"=>false]);
        $form->add("tree_type_age", NumberType::class, ["required"=>false]);
        $form->add("tree_type_level", NumberType::class, ["required"=>false]);
        $form->add("tree_type_branching_angle", NumberType::class, ["required"=>false]);
        $form->add("tree_type_branching_roll", NumberType::class, ["required"=>false]);
        $form->add("tree_type_growth_len", NumberType::class, ["required"=>false]);
        $form->add("tree_type_growth_width", NumberType::class, ["required"=>false]);
        $form->add("tree_type_max_branching_num", NumberType::class, ["required"=>false]);
        $form->add("tree_type_min_branching_num", NumberType::class, ["required"=>false]);

        $form->add("SAVE", SubmitType::class);
        return $form->getForm();
    }

}