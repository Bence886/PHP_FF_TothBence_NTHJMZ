<?php
/**
 * Created by PhpStorm.
 * User: tbenc
 * Date: 2019. 01. 11.
 * Time: 13:05
 */

namespace App\Service;


use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeImmutableToDateTimeTransformer;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserCrudService extends CrudService implements IUserCrudService
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
        return $this->em->getRepository(User::class);
    }

    /**
     * @inheritDoc
     */
    public function getAllUsers()
    {
        return $this->getRepo()->findAll();
    }

    /**
     * @inheritDoc
     */
    public function getUserById($userId)
    {
        $oneUser = $this->getRepo()->find($userId);
        if ($oneUser == null)
        {
            throw new NotFoundHttpException("NO USER");
        }
        return $oneUser;
    }

    /**
     * @inheritDoc
     */
    public function getUserByUserame($userName)
    {
        return $this->getRepo()->findBy(["user_name"=>$userName]);
    }

    /**
     * @inheritDoc
     */
    public function saveUser($oneUser)
    {
        $this->em->persist($oneUser);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function removeUser($userId)
    {
        $oneUser = $this->getUserById($userId);
        $this->em->remove($oneUser);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function getForm($oneUser)
    {
        $form = $this->formFactory->createBuilder(FormType::class, $oneUser);

        $form->add("user_name", TextType::class, ["required"=>true]);
        $form->add("user_registered", DateTimeType::class, ["required"=>true]);
        $form->add("user_rank", TextType::class, ["required"=>true]);

        $form->add("SAVE", SubmitType::class);
        return $form->getForm();
    }

}