<?php

namespace App\Controllers;

use \Core\View;
use\App\Mail;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction(){
        View::renderTemplate('Home/index.html');
        Mail::send('jkmagnussen@outlook.com', 'Password reset','test1mvc', 'test1mvchtml');
    }
}