<?php
use Ips\Forms\LoginForm;

class IndexController extends ControllerBase
{

    public function beforeExecuteRoute($dispatcher)
    {
        $this->flash->error('test');
    }

    public function mainAction()
    {
        $this->flash->error('test');
        $loginForm = new LoginForm();
        $this->view->login_form = $loginForm;
        $this->view->setVars([
            'tokenKey' => $this->security->getTokenKey(),
            'token' => $this->security->getToken()
        ]);
    }

}

