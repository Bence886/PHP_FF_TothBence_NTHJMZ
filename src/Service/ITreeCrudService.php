<?php
namespace App\Service;

use App\Entity\Tree;
use Symfony\Component\Form\FormInterface;

interface ITreeCrudService
{
    /**
     * @return Tree[]
     */
    public function getAllTrees();

    /**
     * @param $treeId int
     * @return Tree[]
     */
    public function getTreeById($treeId);

    /**
     * @param $name string
     * @return Tree[]
     */
    public function getTreesByName($name);

    /**
     * @param $tree_type_id int
     * @return Tree[]
     */
    public function getTreesByTreeType($tree_type_id);

    /**
     * @param $environment_id int
     * @return Tree[]
     */
    public function getTreeByEnvironment($environment_id);

    /**
     * @param $oneTree Tree
     */
    public function saveTree($oneTree);

    /**
     * @param $treeId int
     */
    public function removeTree($treeId);

    /**
     * @param $oneTree Tree
     * @return FormInterface
     */
    public function getForm($oneTree);
}