<?php
namespace App\Service;


use App\Entity\TreeType;
use Symfony\Component\Form\FormInterface;

interface ITreeTypeCrudService
{
    /**
     * @return TreeType[]
     */
    public function getAllTreeTypes();

    /**
     * @param $name string
     * @return TreeType[]
     */
    public function getTreeTypeByName($name);

    /**
     * @param $treeTypeId int
     * @return TreeType[]
     */
    public function getTreeTypeById($treeTypeId);

    /**
     * @param $oneTreeType TreeType
     */
    public function saveTreeType($oneTreeType);

    /**
     * @param $treeTypeId int
     */
    public function removeTreeType($treeTypeId);

    /**
     * @param $oneTreeType TreeType
     * @return FormInterface
     */
    public function getForm($oneTreeType);
}