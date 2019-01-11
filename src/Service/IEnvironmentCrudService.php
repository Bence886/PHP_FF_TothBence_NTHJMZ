<?php
namespace App\Service;


use App\Entity\Environment;
use Symfony\Component\Form\FormInterface;

interface IEnvironmentCrudService
{
    /**
     * @return Environment[]
     */
    public function getAllEnvironments();

    /**
     * @param $environmentId int
     * @return Environment[]
     */
    public function getEnvironmentById($environmentId);

    /**
     * @param $name string
     * @return Environment[]
     */
    public function getEnvironmentByName($name);

    /**
     * @param $oneEnvironment Environment
     */
    public function saveEnvironment($oneEnvironment);

    /**
     * @param $environmentId int
     */
    public function removeEnvironment($environmentId);

    /**
     * @param $oneEnvironment Environment
     * @return FormInterface
     */
    public function getEnvironmentForm($oneEnvironment);
}