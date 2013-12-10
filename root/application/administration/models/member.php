<?php

class Member extends ActiveRecord\Model
{
	
  var $password = FALSE;
  

  
  function set_password($plaintest)
  {
    $this->hashed_password = $this->hash_password($plaintext);
  }
  
  private function hash_password($password)
  {
      $salt = bin2hex(mcrypt_create_iv(32,MCRYPT_DEV_URANDOM));
      $hash = hash('sha256',$salt.$password);
      
      return $salt.$hash;
  }
  
  private function validate_password($password)
  {
      $salt = substr($this->hashed_password, 0 , 64);
      $hash = substr($this->hashed_password, 64, 64);
      
      $password_hash = hash('sha256', $salt.$password);
      
      return $password_hash == $hash;
  }
  
  private   function hash_key($email)
  {
      $salt = bin2hex(mcrypt_create_iv(32,MCRYPT_DEV_URANDOM));
      $hash = hash('sha256',$salt.$email);
      
      return $salt.$hash;
  }
  
  public static function validate_login($email,$password)
  {
      $member = member::find_by_email($email);
      
      if($member && $member->validate_password($password))
      {
      
      	    member::login($member->id);
      		return $member;
      }
          
      else
          return FALSE;
  }
  
  public static function login($member_id)
  {
      $CI =& get_instance();
      $CI->session->set_userdata('member_id',$member_id);
  }
  
  public static function logout()
  {
 		$CI =& get_instance();
 		$CI->session->sess_destroy();
 	    redirect ('login');
 
  }
 
  public function registration($email,$password,$firstname,$lastname,$tel,$entreprise)
  {
    $newpwd = member::hash_password($password);
 	$key_set = member::hash_key($email);
	$new_visiter = array('email'=>$email,'hashed_password'=>$newpwd,'firstname'=>$firstname,'lastname'=>$lastname,'key_set'=>$key_set,'status'=>'active','tel'=>$tel,'entreprise'=>$entreprise);
	$result = member::create($new_visiter);
	if($result){
		$member =member::find_by_email($email);
		if($member){
			member::login($member->id);
			return true;
		}
		
	}
  }
  
  public function set_newpwd($id,$password,$email)
  {
  	$newpwd = member::hash_password($password);
  	$newkey = member::hash_key($email);
  	$pwd = member::find_by_id($id);
  	$pwd->hashed_password = $newpwd;
  	$pwd->key_set = $newkey;
  	if($pwd->save()){
  		return true;
  	}
  }
  
}