<?php

class UserController extends ControllerBase
{

    public function loginAction()
    {
        $post = $this->request->getPost();
        var_dump($post, $this->security->getSessionToken());die;
    }

}

