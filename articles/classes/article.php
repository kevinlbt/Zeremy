<?php

class Article {

    private int $id;
    private ?string $title = null;
    private ?string $content = null;
    private ?string $date = null;
    private ?string $link = null;
    private ?string $user_id = null;



// setter and getter 


    public function getId () {

        return $this->id;
    }

    public function setId ($id) {

        $this->$id = $id;
        return $this;

    }

    public function getTitle () {

        return $this->title;
    }

    public function setTitle ($title) {

        $this->$title = $title;
        return $this;

    }

    public function getContent () {

        return $this->content;
    }

    public function setContent ($content) {

        $this->$content = $content;
        return $this;

    }

    public function getDate () {

        return $this->date;
    }

    public function setDate ($date) {

        $this->$date = $date;
        return $this;

    }

    public function getLink () {

        return $this->date;
    }

    public function setLink ($link) {

        $this->$link = $link;
        return $this;

    }

    public function getUserId () {

        return $this->user_id;
    }

    public function setUserId ($userId) {

        $this->$user_id = $userId;
        return $this;

    }
    

// function article



}