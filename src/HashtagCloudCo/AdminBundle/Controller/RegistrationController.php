<?php


namespace HashtagCloudCo\AdminBundle\Controller;

use HashtagCloudCo\AdminBundle\Entity\users;
use HashtagCloudCo\AdminBundle\Form\usersType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/reg", name="user_registration")
     */
    public function regAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new users();
        $form = $this->createForm(usersType::class, $user);

//        $user->setUsername('admin');
//        $user->setPassword('saroz123');
//        $user->setEmail('ksaroz@gmail.com');

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('Home_post');

        }

        return $this->render('@HashtagCloudCoAdmin/Home/reg.html.twig',
            ['form' => $form->createView(),]
        );
    }

}