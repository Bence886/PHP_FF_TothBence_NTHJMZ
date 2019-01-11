<?php
/**
 * Created by PhpStorm.
 * User: tbenc
 * Date: 2019. 01. 11.
 * Time: 10:40
 */

namespace App\Controller;


use App\Entity\Environment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EnvironmentController
 * @package App\Controller
 * @Route(path="environment")
 */
class EnvironmentController extends Controller
{
    /**
     * @Route(path="/environment_list", name="environmentList")
     * @param Request $request
     * @return Response
     * @Security("has_role('ROLE_ADMIN') or has_role('ROLE_USER')")
     */
    public function environmentListAction(Request $request): Response
    {
        $environmentService = $this->get('app.environments');
        $environments = $environmentService->getAllEnvironments();
        $twigParams = array("environments"=>null);
        foreach ($environments as $env) {
            $twigParams["environments"][] = $env;
        }

        return $this->render('tree/list_environments.html.twig', $twigParams);
    }

    /**
     * @Route(path="/environment_edit/{environmentId}", name="environmentEdit")
     * @param Request $request
     * @param int $environmentId
     * @return Response
     * @Security("has_role('ROLE_ADMIN') or has_role('ROLE_USER')")
     */
    public function environmentEditAction(Request $request, $environmentId=0): Response
    {
        $envService = $this->get('app.environments');
        if ($environmentId){
            $oneEnv = $envService->getEnvironmentById($environmentId);
        } else {
            $oneEnv = new Environment();
        }
        $form = $envService->getEnvironmentForm($oneEnv);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $envService->saveEnvironment($oneEnv);
            $this->addFlash('notice', 'Environment edited');
            return $this->redirectToRoute('environmentList');
        }
        return $this->render('tree/edit_environment.html.twig',
            ["form"=>$form->createView()]);
    }

    /**
     * @Route(path="/environment_delete/{environmentId}", name="environmentDelete")
     * @param Request $request
     * @param int $environmentId
     * @return Response
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function environmentDeleteAction(Request $request, $environmentId=0): Response
    {
        $envService = $this->get('app.environments');
        $envService->removeEnvironment($environmentId);
        return $this->redirectToRoute('environmentList');
    }
}