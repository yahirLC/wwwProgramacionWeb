<?php

class UserData extends Extra{

public static $tablename = "user";
public $extra_fields_strings;
public $extra_fields;

public function __construct(){
    $this->extra_field = array();
    $this->extra_fields_strings = array();
    $this->name = "";
    $this->username = "";
    $this->password = "";
    $this->status = "";
    $this->lastname = "";
    $this->kind = 1;
    

}

public static function getByID($id)
{
    $sql = "select * from user where id =".$id;
    $query = Executor::doit($sql);
    return Model::one($query[0],new UserData());
}

}


?>