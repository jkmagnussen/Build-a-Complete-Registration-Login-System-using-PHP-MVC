<?php 

namespace App\Controllers;
use \Core\View;
/** 
 *  Profile controller 
 * 
 * PHP version 7.0 + 
 */
class Profile extends Authenticated{
    
    /** 
    * Show the profile 
    *
    * @return void 
    */
    public function showAction(){
        View::renderTemplate('Profile/show.html');
    }
}