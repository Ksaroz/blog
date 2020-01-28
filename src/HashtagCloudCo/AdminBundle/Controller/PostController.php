<?php


namespace HashtagCloudCo\AdminBundle\Controller;


use HashtagCloudCo\AdminBundle\Entity\Posts;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PostController extends Controller
{
    public function postAction()
    {
        $data = [];
        try {
            $postrepo = $this->getDoctrine()->getRepository('HashtagCloudCoAdminBundle:Posts');

            $postdts = $postrepo->findAll();

            if (!$postdts) {
                echo 'No product found';
            }


            return $this->render('@HashtagCloudCoAdmin/Home/post.html.twig', array('viewPost' => $postdts));
        } catch (\Throwable $t) {

            $data['message'] = $t->getMessage();
            $this->addFlash('error', $data['message']);
            return new JsonResponse($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }




//        /**
//         *@Route("/post/delete/{id}")
//         * @method({"DELETE"})
//         */
    public
    function deleteAction(
        Request $request
    ) {
        $data = [];
        try {
            $id = (int)$request->get('id');
            $em = $this->getDoctrine()->getManager();
            $post = $em->getRepository(Posts::class)->find($id);

            $em->remove($post);
            $em->flush();
            $data['message'] = 'Post deleted succesfully.';
            $this->addFlash('success', $data['message']);
            return new JsonResponse($data, Response::HTTP_OK);
        } catch (\Throwable $t) {
            $data['message'] = $t->getMessage();
            $this->addFlash('error', $data['message']);
            return new JsonResponse($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public
    function showAction()
    {
        $data = [];
        try {

            $uid = $this->container->get('security.token_storage')->getToken()->getUser()->getId();

            $author = $this->getDoctrine()->getRepository(Posts::class)
                ->getAuthor($uid);

            return $this->render('@HashtagCloudCoAdmin/Home/show.html.twig',
                ['postAuthor' => $author]);
        } catch (\Throwable $t) {
            $data['message'] = $t->getMessage();
            $this->addFlash('error', $data['message']);
            return new JsonResponse($data, Response::HTTP_INTERNAL_SERVER_ERROR);
        }


//        return $this->redirectToRoute('show', array(
//            'author' => $author
//        ));
    }


}
