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
        $user = $this->getUserOrExit($token);
        View::renderTemplate('Password/reset.html', ['token' => $token]);
    }

    /**
     * Reset the user's password
     * 
     * @return void
     */
    public function resetPasswordAction(){
        $token = $_POST['token'];
        $user = $this->getUserOrExit($token);

        if($user->resetPassword($_POST['password'])){
            
            View::renderTemplate('Password/reset_success.html');
            
        }else{
            
            View::renderTemplate('Password/reset.html', [
                'token' => $token,
                'user' => $user
            ]);
        }
    }

    /** Finf the user model associated with the password reset token, or end the request with a message 
     * 
     * @param string $token Password reset token sent to user
     * 
     * @return mixed User object if found & the token hasn't expired, null otherwise
     */
    protected function getUserOrExit($token){
        $user = User::findPasswordReset($token);
        if($user){
            return $user;
        }else{
            View::renderTemplate('Password/token_expired.html');
            exit;
        }
    }
}