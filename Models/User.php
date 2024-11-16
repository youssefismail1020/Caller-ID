<?php

class User
{
    public $id;
    public $name;
    public $phonenumber;
    public $password;
    public $roleid;


	/**
	 * @return mixed
	 */
	public function getRoleid() {
		return $this->roleid;
	}
	
	public function setRoleid($roleid){
		$this->roleid = $roleid;
		return $this;
	}

}


?>