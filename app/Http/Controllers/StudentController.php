<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreStudentRequest;
use App\Interfaces\Services\IStudentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Exception;

class StudentController extends Controller
{

    /** @var IStudentService  $studentService */
    private IStudentService $studentService;

    public function __construct(IStudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * @return View
     */
    public function registerStudentForm(): View
    {
        try{
            return view('students.register-student');

        }catch(Exception $exception){
            Log::error('Erro ao carregar form: '.$exception->getMessage());
            return view('errors.500', 500);
        }
    }

    /**
     * @param StoreStudentRequest $request
     * @return RedirectResponse|View
     */
    public function store(StoreStudentRequest $request): View|RedirectResponse
    {
        try{
            $student = $this->studentService->store($request['name'], $request['cpf']);

            return redirect()->route('profile.register.student');

        }catch(Exception $exception){
            Log::error('Erro ao salvar estudante: '.$exception->getMessage());
            return view('errors.500', [], 500);
        }
    }

    /**
     * @return view
     */
    public function listStudents(): View
    {
        try{
            $students = $this->studentService->getAllStudents();

            return view('students.students', compact('students'));
        }catch(Exception $exception){
            Log::error('Erro ao buscar estudantes: '.$exception->getMessage());
            return view('errors.500', [], 500);
        }
    }

    /**
     * @param string $id
     * @return View|Response
     */
    public function showStudent(string $id): View|Response
    {
        try{
            $student = $this->studentService->getStudentById(decrypt($id));

            return view('students.student', compact('student'));
        }catch (Exception $exception){
            Log::error('Erro ao buscar estudante: '.$exception->getMessage());
            return response()->view('errors.500', [], 500);        }
    }
}
