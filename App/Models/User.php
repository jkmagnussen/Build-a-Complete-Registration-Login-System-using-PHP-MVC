<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

  /**
   * Error messages 
   * 
   * @var array
   */
  public $errors = [];

     /** 
      * *
      * Class constructor 
      * 
      * @param array $data Initial property value 
      * 
      * @return void 
      */
      public function __construct($data){

        foreach ($data as $key => $value){
            $this->$key = $value;
        };
      }

    /** 
    * save the user model with the current property values 
    *@return void

    */ 
    public function save(){

      $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO users (name, email, password_hash)
        VALUES (:name, :email, :password_hash)';

        $db = static::getDB();
        $stmt = $db->prepare($sql);

        $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->email, PDO::PARAM_STR );
        $stmt->bindValue(':password_hash', $password_hash, PDO::PARAM_STR);

        $stmt->execute();
        
    }

    /** Validate current property values, adding validation error messages 
     * to the errors array property 
     * @return void 
     */

     public function validate(){

      // Name 
      if($this->name == ''){
        $this->errors[] = 'Name is required';
      }

     }


  
}