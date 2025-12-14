<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Collection;
use App\Models\Student;

interface IStudentRepository
{
    /**
     * @param string $name
     * @param string $cpf
     * @return Student
     */
    public function store(string $name, string $cpf): Student;

    /**
     * @return Collection
     */
    public function getAllStudents(): Collection;

}
