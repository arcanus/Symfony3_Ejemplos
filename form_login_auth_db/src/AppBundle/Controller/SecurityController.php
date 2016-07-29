<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
      $authentication_utils = $this->get('security.authentication_utils');

      //Obtenemos el error en caso de que se produzca
      $error = $authentication_utils->getLastAuthenticationError();

      //Obtenemos el ultimo nombre de usuario usado para loguearse
      $last_user = $authentication_utils->getLastUserName();

      return $this->render('default/login.html.twig', array(
        'last_username' => $last_user,
        'error' => $error,
      ));

    }
}
