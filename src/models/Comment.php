<?php
namespace App\Models;

class Comment
{
    private $username;
    private $content;

    public function getUsername() { return $this->username; }
    public function getContent() { return $this->content; }

    public function setUsername($username) { $this->username = $username; }
    public function setContent($content) { $this->content = $content; }
}
