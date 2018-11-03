<?php
namespace App\Service;


use App\Entity\Environment;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\CommandLoader\FactoryCommandLoader;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EnvironmentCrudService extends CrudService implements IEnvironmentCrudService
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
        return $this->em->getRepository(Environment::class);
    }

    /**
     * @inheritDoc
     */
    public function getAllEnvironments()
    {
        return $this->getRepo()->findAll();
    }

    /**
     * @inheritDoc
     */
    public function getEnvironmentById($environmentId)
    {
        $oneEnv = $this->getRepo()->find($environmentId);
        if ($oneEnv == null)
        {
            throw new NotFoundHttpException("NO ENVIRONMENT");
        }
        return $oneEnv;
    }

    /**
     * @inheritDoc
     */
    public function getEnvironmentByName($name)
    {
        return $this->getRepo()->findBy(["environment_name"=>$name]);
    }

    /**
     * @inheritDoc
     */
    public function saveEnvironment($oneEnvironment)
    {
        $this->em->persist($oneEnvironment);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function removeEnvironment($environmentId)
    {
        $oneEnv = $this->getEnvironmentById($environmentId);
        $this->em->remove($oneEnv);
        $this->em->flush();
    }

    /**
     * @inheritDoc
     */
    public function getEnvironmentForm($oneEnvironment)
    {
        $form = $this->formFactory->createBuilder(FormType::class, $oneEnvironment);

        $form->add("environment_name", TextType::class, ["required"=>false]);
        $form->add("environment_file_name", TextType::class, ["required"=>false]);
        $form->add("environment_altitude", NumberType::class, ["required"=>false]);
        $form->add("environment_rainfall", NumberType::class, ["required"=>false]);
        $form->add("environment_soil_quality", NumberType::class, ["required"=>false]);
        $form->add("environment_wind_direction", TextType::class, ["required"=>false]);
        $form->add("environment_wind_strength", NumberType::class, ["required"=>false]);

        $form->add("SAVE", SubmitType::class);
        return $form->getForm();
    }

}