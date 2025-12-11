<?php

namespace App\Services;

use App\Interfaces\Repositories\IStudentRepository;
use App\Interfaces\Services\IStudentService;
use App\Models\Student;
use Exception;
use RuntimeException;

class StudentService implements IStudentService
{

    /** @var IStudentRepository  */
    private IStudentRepository $studentRepository;

    /**
     * @param IStudentRepository $studentRepository
     */
    public function __construct (IStudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * @param string $name
     * @param string $cpf
     * @return Student
     */
    public function store(string $name, string $cpf): Student
    {
        try{

            $student = $this->studentRepository->store($name, $cpf);

            return $student;

        } catch (Exception $e) {
            throw new RuntimeException('Erro ao tentar criar resposta de palavra disc: ' . $e->getMessage());
        }
    }
}
