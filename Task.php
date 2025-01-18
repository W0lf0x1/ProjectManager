<?php

class Task {
    private $title;
    private $description;
    private $status;

    public function __construct($title, $description) {
        $this->title = $title;
        $this->description = $description;
        $this->status = "Не выполнено";
        echo "Задача '{$this->title}' создана.\n";
    }

    public function __destruct() {
        echo "Задача '{$this->title}' удалена из памяти.\n";
    }

    public function __call($method, $arguments) {
        if (strpos($method, 'set') === 0) {
            $property = strtolower(substr($method, 3));
            if (property_exists($this, $property)) {
                $this->$property = $arguments[0];
                echo "Свойство '{$property}' изменено на '{$arguments[0]}'.\n";
            } else {
                echo "Свойство '{$property}' не существует.\n";
            }
        } elseif (strpos($method, 'get') === 0) {
            $property = strtolower(substr($method, 3));
            if (property_exists($this, $property)) {
                return $this->$property;
            } else {
                echo "Свойство '{$property}' не существует.\n";
            }
        } else {
            echo "Метод '{$method}' не существует.\n";
        }
    }

    public function __toString() {
        return "Задача: {$this->title} — {$this->status}\n";
    }
}

