<?php 

namespace App\Controllers;

use \Core\View;

/** 
 * Password controller 
 * 
 * PHP version 7.0 + 
 */
class Password extends \Core\Controller{ 
    /**
     * Show the forgotten password page 
     * 
     * @return void 
     */
    public function forgotAction(){
        View::renderTemplate('Password/forgot.html');
    }

    /**
     * Send the password reset link to the supplied email 
     * 
     * @return void
     */
    public function requestResetAction(){
        User::sendPasswordReset($_POST['email']);
    }
}