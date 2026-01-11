<?php

namespace App\Interfaces\Services;

use Illuminate\Support\Collection;
use App\Models\Student;
use Exception;

interface IStudentService
{

    /**
     * @param string $name
     * @param string $cpf
     * @return Student
     */
    public function store(string $name, string $cpf): Student;

    /**
     * @return Collection
     * @throws Exception
     */
    public function getAllStudents(): Collection;

    /**
     * @param int $id
     * @return Student
     * @throws Exception
     */
    public function getStudentById(int $id): Student;

}
