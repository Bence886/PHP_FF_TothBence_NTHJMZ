<?php
namespace App\Service;


use App\Entity\Environment;
use App\Entity\Tree;
use App\Entity\TreeType;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TreeCrudService extends CrudService implements ITreeCrudService
{
    public function __construct(EntityManager $em, FormFactory $formFactory, Request $request)
    {
        parent::__construct($em, $formFactory, $request);
    }

    public function getRepo()
    {
        return $this->em->getRepository(Tree::class);
    }

    /**
     * @inheritDoc
     */
    public function getAllTrees()
    {
        return $this->getRepo()->findAll();
    }

    /**
     * @inheritDoc
     */
    public function getTreeById($treeId)
    {
        $oneTree = $this->getRepo()->find($treeId);
        if ($oneTree == null)
        {
            throw new NotFoundHttpException("NO TREE");
        }
        return $oneTree;
    }

    /**
     * @inheritDoc
     */
    public function getTreesByName($name)
    {
        return $this->getRepo()->findBy(["tree_name"=>$name]);
    }

    /**
     * @inheritDoc
     */
    public function getTreesByTreeType($tree_type_id)
    {
        return $this->getRepo()->findBy(["tree_environment"=>$tree_type_id]);
    }

    /**
     * @inheritDoc
     */
    public function getTreeByEnvironment($environment_id)
    {
        return $this->getRepo()->findBy(["tree_tree_type"=>$environment_id]);
    }

    /**
     * @inheritDoc
     */
    public function saveTree($oneTree)
    {
        $this->em->persist($oneTree);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function removeTree($treeId)
    {
        $oneTree = $this->getTreeById($treeId);
        $this->em->remove($oneTree);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function getForm($oneTree)
    {
        $form = $this->formFactory->createBuilder(FormType::class, $oneTree);

        $form->add("tree_name", TextType::class, ["required"=>false]);
        $form->add("tree_age", NumberType::class, ["required"=>false]);
        $form->add("tree_resolution", NumberType::class, ["required"=>false]);
        $form->add("tree_sketchfab_link", TextType::class, ["required"=>false]);
        $form->add("tree_file_name", TextType::class, ["required"=>false]);

        $form->add("tree_environment", EntityType::class, [
            "class"=>Environment::class,
            "choice_label"=>"environment_name",
            "choice_value"=>"environment_id"
        ]);

        $form->add("tree_tree_type", EntityType::class, [
            "class"=>TreeType::class,
            "choice_label"=>"tree_type_name",
            "choice_value"=>"tree_type_id"
        ]);

        $form->add("SAVE", SubmitType::class);
        return $form->getForm();
    }
}