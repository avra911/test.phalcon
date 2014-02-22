<?php
use Ips\Forms\LoginForm;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $loginForm = new LoginForm();
        $this->view->login_form = $loginForm;
        $this->view->setVars([
            'tokenKey' => $this->security->getTokenKey(),
            'token' => $this->security->getToken()
        ]);
    }

}

