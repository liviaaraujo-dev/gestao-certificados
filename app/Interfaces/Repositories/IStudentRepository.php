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
     * @return Collection<int, Student>
     */
    public function getAllStudents(): Collection;

    /**
     * @param int $id
     * @return Student
     */
    public function getStudentById(int $id): Student;

}
