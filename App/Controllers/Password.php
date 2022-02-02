<?php 

namespace App\Controllers;

use \Core\View;
use \App\Models\User;

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

        View::renderTemplate('Password/reset_requested.html');
    }

    /**
     * Show the reset password form
     * 
     * @return void
     */
    public function resetAction(){
        $token = $this->route_params['token'];

        $user = User::findPasswordReset($token);

        if($user){
            View::renderTemplate('Password/reset.html', ['token' => $token]);
        }else{
            echo "password reset token invalid";
        }
    }

    /**
     * Reset the user's password
     * 
     * @return void
     */
    public function resetPasswordAction(){

        $token = $_POST['token'];

        $user = User::findPasswordReset($token);

        if($user){
            echo "reset user's password here";
        }else{
            echo "password reset token invalid";
        }

    }
}