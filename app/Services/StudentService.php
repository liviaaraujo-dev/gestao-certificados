<?php

namespace App\Services;

use App\Interfaces\Repositories\IStudentRepository;
use App\Interfaces\Services\IStudentService;
use App\Models\Student;
use Exception;
use Illuminate\Support\Collection;
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
            return $this->studentRepository->store($name, $cpf);

        } catch (Exception $e) {
            throw new RuntimeException('Erro ao tentar criar resposta de palavra disc: ' . $e->getMessage());
        }
    }

    /**
     * @return Collection
     * @throws Exception
     */
    public function getAllStudents(): Collection
    {
        try{
            return $this->studentRepository->getAllStudents();
        }catch (Exception $e){
            throw new RuntimeException('Erro ao tentar criar resposta de palavra disc: ' . $e->getMessage());
        }
    }
}
