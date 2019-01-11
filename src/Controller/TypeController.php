<?php
/**
 * Created by PhpStorm.
 * User: tbenc
 * Date: 2019. 01. 11.
 * Time: 10:42
 */

namespace App\Controller;


use App\Entity\TreeType;
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
        $typeService = $this->get('app.treetypes');
        $types = $typeService->getAllTreeTypes();
        $twigParams = array("types"=>null);
        foreach ($types as $type) {
            $twigParams["types"][] = $type;
        }

        return $this->render('tree/list_types.html.twig', $twigParams);
    }

    /**
     * @Route(path="/type_edit/{typeId}", name="typeEdit")
     * @param Request $request
     * @param int $typeId
     * @return Response
     * @Security("has_role('ROLE_ADMIN') or has_role('ROLE_USER')")
     */
    public function typeEditAction(Request $request, $typeId=0): Response
    {
        $typeService = $this->get('app.treetypes');
        if ($typeId){
            $oneType = $typeService->getTreeTypeById($typeId);
        } else {
            $oneType = new TreeType();
        }
        $form = $typeService->getForm($oneType);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $typeService->saveTreeType($oneType);
            $this->addFlash('notice', 'Type edited');
            return $this->redirectToRoute('typeList');
        }
        return $this->render('tree/edit_type.html.twig',
            ["form"=>$form->createView()]);
    }

    /**
     * @Route(path="/type_delete/{typeId}", name="typeDelete")
     * @param Request $request
     * @param int $typeId
     * @return Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function typeDeleteAction(Request $request, $typeId=0): Response
    {
        $typeService = $this->get('app.treetypes');
        $typeService->removeTreeType($typeId);
        return $this->redirectToRoute('typeList');
    }
}