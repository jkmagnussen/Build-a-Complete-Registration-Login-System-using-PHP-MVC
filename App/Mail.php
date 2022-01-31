<?php 
namespace App;

require '../vendor/autoload.php';
use App\Config;
use Mailgun\Mailgun;

/** 
 * 
 *  PHP version 7.0 + 
 */
class Mail {

    /** 
     * Send a message 
     * 
     * @param string $to Recipient 
     * @param string $subject Subject 
     * @param string $text Text-only content of the message 
     * @param string $html HTML content of the message 
     * 
     * @return mixed 
     */

    public static function send($to, $subject, $text, $html){

        // First, instantiate the SDK with your API credentials
        $mg = new Mailgun(Config::MAILGUN_API_KEY); 
        $domain = Config::MAILGUN_DOMAIN;

        $mg->sendMessage($domain, array(
            'from'    => 'MVC project <mailgun@jkmagnussen.com>',
            'to'      => $to,
            'subject' => $subject,
            'text'    => $text,
            'html'    => $html));
    }
}