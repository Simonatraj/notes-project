<?php

use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;
use Core\ValidationException;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt(
    $attributes['email'], $attributes['password']
);

if (!$signedIn) {
    $form->error(
        'exist_account', 'No matching account found for that email address and password.'
    )->throw();
}

redirect('/');

