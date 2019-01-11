<?php
/**
 * Created by PhpStorm.
 * User: tbenc
 * Date: 2019. 01. 11.
 * Time: 10:39
 */

namespace App\Controller;


use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 * @package App\Controller
 * @Route(path="user")
 */
class UserController extends Controller
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
        $userService=$this->get("app.users");
        $user = new User();
        $uname = $request->request->get("_username");
        $clearpass = $request->request->get("_password");
        $hashpass = $this->get("security.password_encoder")->encodePassword($user, $clearpass);
        $user->setUserEmail($uname);
        $user->setUserPass($hashpass);
        $user->setUserRank("USER");
        try {
            $userService->saveUser($user);
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
     * @Route(path="/user_list", name="userList")
     * @param Request $request
     * @return Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function userListAction(Request $request): Response
    {
        $userService = $this->get('app.users');
        $users = $userService->getAllUsers();
        $twigParams = array("users"=>null);
        foreach ($users as $user) {
            $twigParams["users"][] = $user;
        }

        return $this->render('tree/list_users.html.twig', $twigParams);
    }

    /**
     * @Route(path="/user_edit/{userId}", name="userEdit")
     * @param Request $request
     * @param int $userId
     * @return Response
     * @Security("has_role('ROLE_ADMIN') or has_role('ROLE_USER')")
     */
    public function userEditAction(Request $request, $userId=0): Response
    {

    }

    /**
     * @Route(path="/user_delete/{userId}", name="userDelete")
     * @param Request $request
     * @param int $userId
     * @return Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function userDeleteAction(Request $request, $userId=0): Response
    {

    }
}