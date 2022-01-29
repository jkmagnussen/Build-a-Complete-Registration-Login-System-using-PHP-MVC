<?php 

namespace App;

use Mailgun\Mailgun;
use App\Config;

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
        $mg = new Mailgun(Config::MAILGUN_API_KEY); // For EU servers
        $domain = Config::MAILGUN_DOMAIN;
        

        // Now, compose and send your message.
        // $mg->messages()->send($domain, $params);
        $mg->sendMessage($domain, ['from'    => 'bob@example.com',
                                        'to'      => $to,
                                        'subject' => $subject,
                                        'text'    => $text,
                                        'html'    => $html]);
    }

}