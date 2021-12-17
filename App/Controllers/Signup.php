<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHPp version 7.0
 */
class Signup extends \Core\Controller
{

    /**
     * Show the index pageeebbbb
     *
     * @return void
     */
    public function newAction()
    {
        View::renderTemplate('Signup/new.html');
    }


    /** Sign up a new user  */

    public function createAction(){
        var_dump($_POST);
    }
}