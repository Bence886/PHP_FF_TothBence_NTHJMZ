<?php
/**
 * Created by PhpStorm.
 * User: tbenc
 * Date: 2019. 01. 11.
 * Time: 8:39
 */

namespace App\Controller;


use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TreeController
 * @package App\Controller
 * @Route(path="tree")
 */
class TreeController extends Controller
{
    /**
     * @Route(path="/tree_list", name="treeList")
     * @param Request $request
     * @return Response
     * @Security("has_role('ROLE_ADMIN') or has_role('ROLE_USER')")
     */
    public function treeListAction(Request $request): Response
    {
        $treeService = $this->get('app.trees');
        $trees = $treeService->getAllTrees();
        $twigParams = array("trees"=>null);
        foreach ($trees as $tree) {
            $twigParams["trees"][] = $tree;
        }

        return $this->render('tree/list_trees.html.twig', $twigParams);
    }

    /**
     * @Route(path="/tree_edit/{treeId}", name="treeEdit")
     * @param Request $request
     * @param int $treeId
     * @return Response
     * @Security("has_role('ROLE_ADMIN') or has_role('ROLE_USER')")
     */
    public function treeEditAction(Request $request, $treeId=0): Response
    {

    }

    /**
     * @Route(path="/tree_delete/{treeId}", name="treeDelete")
     * @param Request $request
     * @param int $treeId
     * @return Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function treeDeleteAction(Request $request, $treeId=0): Response
    {

    }
}