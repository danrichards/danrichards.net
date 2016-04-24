<?php 

namespace App\Dan\Contact;

use App, Lang, Request;

class ContactValidator {

    protected $errors;
    protected $warnings;
    protected $notices;

    protected $successMessage;

    protected $validator;

    /**
     * Validation rules for this Validator.
     *
     * @var array
     */
    public $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
        'recaptcha_response_field' => 'required'
    ];

    /**
     * return the Form's input
     *
     * @return array
     */
    public function getInput()
    {
        return [
            'name' => Request::input('name'),
            'email' => Request::get('email'),
            'phone' => Request::get('phone'),
            'message' => Request::get('message'),
            'recaptcha_response_field' => Request::get('recaptcha_response_field')
        ];
    }

    /**
     * Validates the contact form. Should check if all the fields are correctly populated
     *
     * @return boolean True if the $user is valid.
     */
    public function validate()
    {
        // Validate Input
        $result = $this->validateInput($this->rules) ? true : false;

        // Validate Recaptcha
        $result = $result ? $this->validateRecaptcha() : $result;

        if ($result AND strlen($this->successMessage))
           $this->attachMsg($this->successMessage, 'success', 'notices');

        return $result;
    }

    /**
     * Uses Laravel Validator to check form input
     *
     * @param string               $ruleSet
     *
     * @return boolean True if the attributes are valid.
     */
    public function validateInput($ruleSet)
    {
        $validator = App::make('validator')->make($this->getInput(), $ruleSet);

        // Validate and attach errors
        if ($validator->fails()) {
            $this->errors = $validator->errors();
            return false;
        } else {
            return true;
        }
    }

    public function validateRecaptcha()
    {
        $challenge = Request::get('recaptcha_challenge_field');
        $input = Request::get('recaptcha_response_field');

        $captcha = new MyRecaptcha();
        list($passed, $response) = $captcha->check($challenge, $input);

        if('true' == trim($passed))
            return true;

        $this->attachMsg(
            'You must enter a valid reCaptcha code.',
            'recaptcha_response_field'
        );
        return false;
    }

    /**
     * Creates a \Illuminate\Support\MessageBag object, add the error message
     * to it and then set the errors attribute of the user with that bag.
     *
     * @param string               $errorMsg The error message.
     * @param string               $key      The key if the error message.
     */
    public function attachMsg($errorMsg, $what, $type = 'errors')
    {
        $messageBag = $this->{$type};

        if (! $messageBag instanceof MessageBag) {
            $messageBag = App::make('Illuminate\Support\MessageBag');
        }

        $messageBag->add($what, $errorMsg);
        $this->{$type} = $messageBag;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getNotices()
    {
        return $this->notices;
    }

    public function hasMessageOnSuccess($msg)
    {
        $this->successMessage = $msg;
    }


} 