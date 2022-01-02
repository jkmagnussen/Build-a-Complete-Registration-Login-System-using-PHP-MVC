<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\User;

/**
 * Home controller
 *
 * PHPp version 7.0
 */
class Signup extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function newAction()
    {
        View::renderTemplate('Signup/new.html');
    }


    /** Sign up a new user  */

    public function createAction(){
        $user = new User($_POST);

        $user->save();

        View::renderTemplate('Signup/success.html');
    }
}