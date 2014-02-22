<?php
namespace Ips\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Submit;
use Phalcon\Forms\Element\Check;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

class LoginForm extends Form
{

    public function initialize($entity = null, $options = null)
    {
        $email = new Text('email_or_phone', array(
            'class' => 'form-control placeholder',
            'value' => !empty($post['email_or_phone']) ? $post['email_or_phone']: 'email or phone',
            'id' => 'email_or_phone_login',
            'title' => "email or phone",
            'data-content' => 'camp obligatoriu',
            'data-placement' => 'top',
            'placeholder' => "email or phone",
            'required' => "required"
        ));
        $this->add($email);

        $password = new Password('password', array(
            'class' => 'form-control placeholder',
            'value' => 'parola',
            'id' => 'password_login',
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

        $remember = new Check('remember', array(
            'value' => 'yes'
        ));
        $remember->setLabel('Tine-ma minte');
        $this->add($remember);

        $this->add(new Submit('Sign In', array(
            'class' => 'btn btn-default',

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