<?php
namespace Ips\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Email;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

class RegisterForm extends Form
{

    public function initialize($entity = null, $options = null)
    {
        $post = $this->session->get('post');
        $name = new Text('name', array(
            'class' => 'form-control placeholder input-lg',
            'value' => !empty($post['name']) ? $post['name']: 'nume',
            'id' => 'name_register',
            'title' => "nume",
            'data-content' => 'camp obligatoriu (minim 2 caractere)',
            'data-placement' => 'top',
            'placeholder' => "nume",
            'required' => "required"
        ));
        $this->add($name);

        $email = new Email('email', array(
            'class' => 'form-control placeholder input-lg',
            'value' => !empty($post['email']) ? $post['email']: 'email',
            'id' => 'email_register',
            'title' => "email",
            'data-content' => 'camp obligatoriu',
            'data-placement' => 'top',
            'placeholder' => "email",
            'required' => "required"
        ));
        $this->add($email);

        $phone = new Text('phone', array(
            'class' => 'form-control placeholder input-lg',
            'value' => !empty($post['phone']) ? $post['phone']: 'telefon',
            'id' => 'phone_register',
            'title' => "telefon",
            'data-content' => 'camp obligatoriu (minim 10 caractere)',
            'data-placement' => 'top',
            'placeholder' => "telefon",
            'required' => "required"
        ));
        $this->add($phone);

        $password = new Password('password', array(
            'class' => 'form-control placeholder input-lg',
            //'value' => !empty($post['password']) ? $post['password']: 'parola', //maybe not the best idea now
            'value' => 'parola',
            'id' => 'password_register',
            'title' => "parola",
            'data-content' => 'camp obligatoriu (minim 8 caractere)',
            'data-placement' => 'top',
            'placeholder' => "parola",
            'required' => "required"
        ));
        $password->addValidators(array(
            new PresenceOf(array(
                'message' => 'The password is required'
            )),
            new StringLength(array(
                'min' => 8,
                'messageMinimum' => 'Password is too short. Minimum 8 characters'
            ))
        ));
        $this->add($password);

        $this->add(new Submit('Sign Up', array(
            'class' => 'btn btn-success btn-lg',

        )));
    }

    /**
     * Prints messages for a specific element
     */
    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                $this->flash->error($message);
            }
        }
    }
}