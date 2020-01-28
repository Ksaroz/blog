<?php

namespace HashtagCloudCo\AdminBundle\Controller;

use HashtagCloudCo\AdminBundle\Entity\users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HashtagCloudCo\AdminBundle\Entity\Posts;

//use HashtagCloudCo\AdminBundle\Entity\users;
//use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class HomeController extends Controller
{
    public function indexAction()
    {

        $postdts = $this->getDoctrine()->getRepository('HashtagCloudCoAdminBundle:Posts')->findAll();

        return $this->render('@HashtagCloudCoAdmin/Home/index.html.twig', array('viewPost' => $postdts));
    }

    public function newAction(Request $request)
    {
//        $user = new users();
        $post = new Posts();
//        $post->setPostName('second post');
//        $post->setPostAuthor('Saroj');
//        $post->setPostBody('Hi this is my second post');
//        $post->setPostStatus('1');

        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        $form = $this->createFormBuilder($post)
            ->add('postName', TextType::class)
            ->add('postAuthor', TextType::class)
            ->add('postBody', TextType::class)
            ->add('postStatus', NumberType::class)
            ->add('save', SubmitType::class, ['label' => 'Save New'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated


            $pn = $form['postName']->getData();
            $pa = $form['postAuthor']->getData();
            $pb = $form['postBody']->getData();
            $ps = $form['postStatus']->getData();

            $post->setpostName($pn);
            $post->setpostAuthor($pa);
            $post->setpostBody($pb);
            $post->setpostStatus($ps);
            $post->setUser($user);


            $entityManager = $this->getDoctrine()->getManager();

//            $entityManager->persist($user);
            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirectToRoute('Home_post');
        }

        return $this->render('@HashtagCloudCoAdmin/Home/new.html.twig', [
            'form' => $form->createView(),
        ]);

//        return $this->render('@HashtagCloudCoAdmin/Home/new.html.twig');
    }


    public function adminAction()
    {


        return $this->render('@HashtagCloudCoAdmin/Home/admin.html.twig');

    }

    public function aboutAction()
    {
        return $this->render('@HashtagCloudCoAdmin/Home/about.html.twig');
    }

    public function serviceAction()
    {
        return $this->render('@HashtagCloudCoAdmin/Home/service.html.twig');
    }


}
