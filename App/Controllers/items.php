<?php 

namespace App\Controllers;

use \Core\View;
use \App\Auth;

/**
 * Item Controller (example)
 * 
 * PHP version 7.0
 */
class Items extends Authenticated{

    /**
     * Items index
     * 
     * @return void
     */
    public function indexAction(){

        View::renderTemplate('Items/index.html');
    }
}