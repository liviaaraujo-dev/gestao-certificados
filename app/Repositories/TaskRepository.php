<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ITaskRepository;
use App\Models\Task;

class TaskRepository implements ITaskRepository
{
    /** @var Task $task */
    private Task $task;

    /**
     * @param Task $task
     */
    public function __construct(Task $task){
        $this->task = $task;
    }

    /**
     * @param string $title
     * @return Task
     */
    public function store(string $title): Task
    {
        return $this->task::firstOrCreate([
            'title' => trim($title),
        ]);
    }
}
