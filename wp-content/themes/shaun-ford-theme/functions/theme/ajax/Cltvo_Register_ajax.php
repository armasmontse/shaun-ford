<?php

require get_template_directory().'/functions/general/vendor/MailchimpHelper.php';

class Cltvo_Register_ajax extends Cltvo_Ajax_Master
{
	static function privMethod()
	{
		// Id of the form that was submited.
		$id_form = "register_js";

		// Input fields rules
		$rules = array(
			'firstname' 	=> 'required',
			'lastname' 		=> 'required',
			'email' 		=> 'required',
        );

		// Input rules messages
		$messages = array(
			'firstname' 	=> 'The first name is required.',
			'lastname' 		=> 'The last name is required.',
			'email' 		=> 'The email is required.',
        );

		// Validating de inputs
		foreach ($rules as $input => $rule) {
			if ($rule == 'required') {
				if (!isset($_POST[$id_form][$input]) || empty($_POST[$id_form][$input])) {

					header('HTTP/1.1 403 Unauthorized');
					header('Content-Type: application/json; charset=UTF-8');

					$data = array(
						'message' => isset($messages[$input]) ? $messages[$input]: 'Llena todos los campos del formulario.',
					);

					die(json_encode($data));

				}
			}
		}

		// Assigning input to variables
		$firstname	= $_POST[$id_form]['firstname'];
		$lastname	= $_POST[$id_form]['lastname'];
		$email 		= $_POST[$id_form]['email'];

		// Variable for mail form where we are going to send

		$contact = new Cltvo_Page_Contact;

		if (!defined('CLTVO_ISLOCAL') || ( CLTVO_ISLOCAL != true)) {
			$mail = $contact->social_net['phone'];
		}else {
			$mail = 's@elcultivo.mx';
		}

		$new_subscriber = new MailchimpHelper($mail, trim($firstname . ' ' . $lastname));

		header('Content-Type: application/json; charset=UTF-8');

		if ($new_subscriber->mc_checklist() == 'subscribed') {
		    
		    $data = array(
		        'success' => true,
		        'message' => "This mail has been registered before."
		    );

		    header('HTTP/1.1 500 Message could not be sent.');
		    die(json_encode($data));
		}

		$request_mailchimp = $new_subscriber->mc_subscribe();

		if ($request_mailchimp->status != 'subscribed') {
		    $data = array(
		        'success' => true,
		        'message' => "Can not register to list, try later."
		    );

		    header('HTTP/1.1 500 Message could not be sent.');
		    die(json_encode($data));
		}

		$data = array(
		    'data'    => $request_mailchimp->status,
		    'message' => "Mail registered succesfully",
		    'success' => true
		);

		die(json_encode($data));
    }

}
