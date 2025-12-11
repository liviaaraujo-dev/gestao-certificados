<?php

namespace App\Interfaces\Repositories;

use App\Models\Student;

interface IStudentRepository
{
    /**
     * @param string $name
     * @param string $cpf
     * @return Student
     */
    public function store(string $name, string $cpf): Student;
}
