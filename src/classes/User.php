<?php

class User {

    private int $id;
    private ?string $username = null;
    private ?string $password = null;
    private ?string $name = null;


    public function __construct ($username = null, $password = null) {

        if (!empty($username))
            $this->username = $username;
    
        if (!empty($password)) {
            $this->password = $password;
        }
    }
    
//setter and getter

    public function getId () {

        return $this->id;
    }

    public function setId ($id) {

        $this->$id = $id;
        return $this;

    }

    public function getUsername () {

        return $this->username;
    }

    public function setUsername ($username) {

        $this->$username = $username;
        return $this;

    }

    public function getPassword () {

        return $this->password;
    }

    public function setPassword ($password) {

        $this->$password = $password;
        return $this;

    }

    public function getName () {

        return $this->name;
    }

    public function setName ($name) {

        $this->$name = $name;
        return $this;

    }
}
