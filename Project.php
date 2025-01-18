<?php

class Project {
    private $name;
    private $tasks;

    public function __construct($name) {
        $this->name = $name;
        $this->tasks = [];
        echo "Проект '{$this->name}' создан.\n";
    }

    public function __destruct() {
        echo "Проект '{$this->name}' завершен.\n";
    }

    public function addTask($task) {
        $this->tasks[] = $task;
        echo "Задача '{$task->getTitle()}' добавлена в проект '{$this->name}'.\n";
    }

    public function __toString() {
        $taskCount = count($this->tasks);
        return "Проект: {$this->name}, Количество задач: {$taskCount}\n";
    }
}
