<?php

namespace HashtagCloudCo\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $errors = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

//        return $this->redirectToRoute('Home_post');

        return $this->render('@HashtagCloudCoAdmin/Login/login.html.twig', [
            'last_username' => $lastUsername,
            'errors'         => $errors,
        ]);
    }

}
