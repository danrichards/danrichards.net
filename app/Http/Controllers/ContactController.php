<?php

namespace App\Http\Controllers;

class ContactController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function compose()
	{
        return view('pages.contact', $this->data(['recaptcha' => true]));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function process()
	{
        $contact = new ContactValidator();
        $contact->hasMessageOnSuccess("Your message has been sent :)");
        $input = $contact->getInput();

        if ($contact->validate()) {
            \Mail::queueOn(
                'default',
                'emails.contact.me',
                compact('input'),
                function ($message) use ($input) {
                    $message
                        ->to(config('danrichards.email'), 'Dan Richards')
                        ->replyTo($input['email'], $input['name'])
                        ->subject("Message from ".$input['name']."<".$input['email']."> via DanRichards.net");
                }
            );
            return \Redirect::action('ContactController@sent')
                ->with('notices', $contact->getNotices());
        } else {
            return \Redirect::back()
                ->withInput($input)
                ->withErrors($contact->getErrors());
        }
	}

	/**
	 * Contact Form Processed Successfully
	 *
	 * @return Response
	 */
	public function sent()
	{
        return view('pages.contact', $this->data(['recaptcha' => false, 'sent' => true]));
	}

}
