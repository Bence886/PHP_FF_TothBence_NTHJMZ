<?php
/**
 * Created by PhpStorm.
 * User: tbenc
 * Date: 2019. 01. 11.
 * Time: 10:42
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TypeController
 * @package App\Controller
 * @Route(path="type")
 */
class TypeController extends Controller
{
    /**
     * @Route(path="/type_list", name="typeList")
     * @param Request $request
     * @return Response
     * @Security("has_role('ROLE_ADMIN') or has_role('ROLE_USER')")
     */
    public function typeListAction(Request $request): Response
    {
        $treeService = $this->get('app.trees');
        $trees = $treeService->getAllTrees();
        $twigParams = array("trees"=>null);
        foreach ($trees as $tree) {
            $twigParams["trees"][] = $tree;
        }

        return $this->render('tree/list_trees.html.twig', $twigParams);
    }
}