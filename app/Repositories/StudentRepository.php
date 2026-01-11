<?php

namespace App\Repositories;

use App\Interfaces\Repositories\IStudentRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Student;

class StudentRepository implements IStudentRepository
{
    /** @var Student $student */
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

    /**
     * @return Collection
     */
    public function getAllStudents(): Collection
    {
        return $this->student->all();
    }

    /**
     * @param int $id
     * @return Student
     */
    public function getStudentById(int $id): Student
    {
        return $this->student->find($id);
    }

}
