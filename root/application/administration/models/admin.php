<?php
class Admin extends ActiveRecord\Model{

	var $password = false;

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

	public static function validate_login($email,$password)
	{
		$admin = admin::find_by_email($email);

		if($admin && $admin->validate_password($password))
		{

			admin::login($admin->id);
			return $admin;
		}else{
			return FALSE;
				
		}
	}

	public static function login($admin_id)
	{
		$CI =& get_instance();
		$CI->session->set_userdata('admin_id',$admin_id);
	}

	public static function logout()
	{
		$CI =& get_instance();
		$CI->session->sess_destroy();
		redirect ('login');

	}
	
	Private function hash_key($email)
	{
		$salt = bin2hex(mcrypt_create_iv(32,MCRYPT_DEV_URANDOM));
		$hash = hash('sha256',$salt.$email);

		return $salt.$hash;
	}
	
	public function set_newpwd($id,$password,$email)
  {
  	$newpwd = admin::hash_password($password);
  	$newkey = admin::hash_key($email);
  	$pwd = admin::find_by_id($id);
  	$pwd->hashed_password = $newpwd;
  	$pwd->key_set = $newkey;
  	if($pwd->save()){
  		return true;
  	}
  }
  
  public function registration($email,$password,$firstname,$lastname,$active,$role)
  {
    $newpwd = admin::hash_password($password);
 	$key_set = admin::hash_key($email);
	$new_admin = array('email'=>$email,'hashed_password'=>$newpwd,'firstname'=>$firstname,'lastname'=>$lastname,'key_set'=>$key_set,'status'=>$active,'role'=>$role);
	$result = admin::create($new_admin);
	if($result){
		return true;
	}else{
		return false;
	}
  }
  
  
}