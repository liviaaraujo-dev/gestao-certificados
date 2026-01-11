<?php

namespace App\Services;

use App\Interfaces\Repositories\IStudentRepository;
use App\Interfaces\Services\IStudentService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Student;
use Exception;

class StudentService implements IStudentService
{

    /** @var IStudentRepository  $studentRepository*/
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
     * @throws Exception
     */
    public function store(string $name, string $cpf): Student
    {
        try{
            DB::beginTransaction();
            $student = $this->studentRepository->store($name, $cpf);
            DB::commit();

            return $student;

        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Erro ao salvar estudante: ' . $exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            throw $exception;
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

        }catch (Exception $exception){
            Log::error('Erro ao buscar todos os estudantes: ' . $exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            throw $exception;        }
    }

    /**
     * @param int $id
     * @return Student
     * @throws Exception
     */
    public function getStudentById(int $id): Student
    {
        try{
            return $this->studentRepository->getStudentById($id);

        }catch (Exception $exception){
            Log::error('Erro ao buscar todos os estudantes: ' . $exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            throw $exception;
        }
    }
}
