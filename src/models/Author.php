<?php

namespace App\Models;

class Author
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $errors = [];

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function setId($id)
    {
        if (!is_int($id) || $id <= 0) {
            $this->errors['id'] = "ID invalide";
            return false;
        }

        $this->id = $id;
        return true;
    }

    public function setName($name)
    {
        $name = trim($name);

        if (empty($name)) {
            $this->errors['name'] = "Le nom est obligatoire";
            return false;
        }

        if (strlen($name) > 255) {
            $this->errors['name'] = "Le nom ne doit pas dépasser 255 caractères";
            return false;
        }

        if (!preg_match('/^[a-zA-ZÀ-ÿ\s\-]+$/', $name)) {
            $this->errors['name'] = "Le nom contient des caractères invalides";
            return false;
        }

        $this->name = $name;
        return true;
    }

    public function setEmail($email)
    {
        $email = trim($email);

        if (empty($email)) {
            $this->errors['email'] = "L'email est obligatoire";
            return false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Email invalide";
            return false;
        }

        if (strlen($email) > 255) {
            $this->errors['email'] = "Email trop long";
            return false;
        }

        $this->email = $email;
        return true;
    }

    public function setPassword($password)
    {
        if (empty($password)) {
            $this->errors['password'] = "Le mot de passe est obligatoire";
            return false;
        }

        if (strlen($password) > 40) {
            $this->errors['password'] = "Hash du mot de passe invalide";
            return false;
        }

        $this->password = password_hash($password, PASSWORD_DEFAULT);
        return true;
    }

    public function setError($colName, $error)
    {
        $this->errors[$colName] = $error;
    }

    public function getAllData()
    {
        return ["name" => $this->name, "email" => $this->email, "password" => $this->password];
    }
}
