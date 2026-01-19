<?php

namespace App;

class Validator
{
    public function validate(array $data, string $model)
    {
        if (!class_exists($model)) {
            http_response_code(500);
            include './src/views/errors/page500.php';
            exit();
        }

        $instance = new $model();
        foreach ($data as $key => $value) {
            $setter = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));

            if (method_exists($instance, $setter)) {
                try {
                    $instance->$setter($value);
                } catch (\InvalidArgumentException $e) {
                    if (method_exists($instance, 'getErrors')) {
                        $errors = $instance->getErrors();
                        $errors[$key] = $e->getMessage();
                    }
                }
            }
        }
        return $instance;
    }
}
