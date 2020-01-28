<?php


namespace HashtagCloudCo\AdminBundle\Controller;


class AdminController extends Controller
{
    public function adminAction() {




        return $this->render('@HashtagCloudCoAdmin/Home/index.html.twig');

    }
}