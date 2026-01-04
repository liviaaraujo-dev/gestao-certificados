<?php

namespace App\Interfaces\Repositories;

use App\Models\Task;

interface ITaskRepository
{
    /**
     * @param string $title
     * @return Task
     */
    public function store(string $title): Task;
}
