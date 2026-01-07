<?php 
class RegisterUser{
	// Class properties
	private $username;
    private $script;
    private $imagen;
	private $descripcion;
	private $raw_password;
	private $encrypted_password;
	public $error;
	public $success;
	private $storage = "data.json";
	private $stored_users;
	private $new_user; // array 


	public function __construct($username, $password, $script, $descripcion, $imagen){

		$this->username = trim($this->username);
		$this->username = filter_var($username, FILTER_SANITIZE_STRING);
		
		$this->script = trim($this->script);
		$this->script = filter_var($script, FILTER_SANITIZE_STRING);

		$this->descripcion = trim($this->descripcion);
		$this->descripcion = filter_var($descripcion, FILTER_SANITIZE_STRING);

        $this->imagen = trim($this->imagen);
		$this->imagen = filter_var($imagen, FILTER_SANITIZE_STRING);
 

		$this->raw_password = filter_var(trim($password), FILTER_SANITIZE_STRING);
		$this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);

		$this->stored_users = json_decode(file_get_contents($this->storage), true);

		$this->new_user = [
			"image" => $this->imagen,
			"title" => $this->username,			
			"description" => $this->descripcion,
			"script" => $this->script,
	
		];

		if($this->checkFieldValues()){
			$this->insertUser();
		}
	}


	private function checkFieldValues(){
		if(empty($this->username) || empty($this->imagen) || empty($this->descripcion) || empty($this->script)){
			$this->error = "Both fields are required.";
			return false;
		}else{
			return true;
		}
	}




	private function insertUser(){
		
			array_push($this->stored_users, $this->new_user);
			if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
				return $this->success = "Tu Script se subio correctamente";
			}else{
				return $this->error = "Something went wrong, please try again";
			}
		
	}



} // end of class