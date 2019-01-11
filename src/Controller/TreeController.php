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
     * @param Request $request
     * @return Response
     * @Route(path="/login", name="login")
     */
    public function loginAction(Request $request) : Response
    {
        $twigParams = array("error"=>"", "last_username"=>"");
        $authUtils = $this->get("security.authentication_utils");
        $twigParams["error"]=$authUtils->getLastAuthenticationError();
        $twigParams["last_username"]=$authUtils->getLastUsername();
        return $this->render("login.html.twig", $twigParams);
    }
    /**
     * @param Request $request
     * @return Response
     * @Route(path="/register", name="register")
     */
    public function registerAction(Request $request) : Response
    {
        // TODO: DTO ... Service ...
        $user = new User();
        $uname = $request->request->get("_username");
        $clearpass = $request->request->get("_password");
        $hashpass = $this->get("security.password_encoder")->encodePassword($user, $clearpass);
        $user->setUserEmail($uname);
        $user->setUserPass($hashpass);
        $user->setUserRank("USER");
        try {
            $this->getDoctrine()->getManager()->persist($user);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("notice", "USER {$uname} REGISTERED");
        }
        catch (\Exception $ex){
            $this->addFlash("notice", "ERROR {$ex->getMessage()}");
        }
        return $this->redirectToRoute("login");
    }
    /**
     * @param Request $request
     * @return Response
     * @Route(path="/logout", name="logout")
     */
    public function logoutAction(Request $request) : Response
    {
    }

    /**
     * @param Request $request
     * @return Response
     * @Route(path="/secure", name="secureContent")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function secureAction(Request $request) : Response
    {
        $this->denyAccessUnlessGranted("ROLE_ADMIN");

        /*
        $authChecker = $this->get("security.authorization_checker");
        if (!$authChecker->isGranted("ROLE_ADMIN")){
            throw $this->createAccessDeniedException();
        }
        */

        return new Response("Secure content, Wololo!");
    }

    /**
     * @Route(path="/list", name="treeList")
     * @param Request $request
     * @return Response
     * @Security("has_role('ROLE_ADMIN')")
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

}