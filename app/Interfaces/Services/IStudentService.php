<?php

namespace App\Interfaces\Services;

use App\Models\Student;

interface IStudentService
{

    /**
     * @param string $name
     * @param string $cpf
     * @return Student
     */
    public function store(string $name, string $cpf): Student;

    public function getAllStudents();

}
