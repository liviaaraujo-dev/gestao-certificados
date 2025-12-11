<?php

namespace App\Repositories;

use App\Interfaces\Repositories\IStudentRepository;
use App\Models\Student;

class StudentRepository implements IStudentRepository
{
    /** @var Student  */
    private Student $student;

    /**
     * @param Student $student
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * @param string $name
     * @param string $cpf
     * @return Student
     */
    public function store(string $name, string $cpf): Student
    {
        return $this->student->create([
            'name' => $name,
            'cpf' => $cpf
        ]);
    }

}
