<?php
namespace App\Models;

class Blog
{
    private $title;
    private $content;
    private $author;
    private $errors = [];

    public function getErrors()
    {
        return $this->errors;
    }

    public function setTitle($title)
    {
        $title = trim($title);

        if (empty($title)) {
            $this->errors['title'] = "Le titre est obligatoire";
            return false;
        }

        if (strlen($title) > 255) {
            $this->errors['title'] = "Le titre est trop long";
            return false;
        }

        $this->title = $title;
        return true;
    }

    public function setContent($content)
    {
        if (empty(trim($content))) {
            $this->errors['content'] = "Le contenu est obligatoire";
            return false;
        }

        $this->content = $content;
        return true;
    }

    public function setAuthor($author)
    {
        if (empty(trim($author))) {
            $this->errors['author'] = "L'auteur est obligatoire";
            return false;
        }

        $this->author = $author;
        return true;
    }

    public function getAllData()
    {
        return [
            "title" => $this->title,
            "content" => $this->content,
            "author" => $this->author,
            "created_at" => new \MongoDB\BSON\UTCDateTime()
        ];
    }
}
