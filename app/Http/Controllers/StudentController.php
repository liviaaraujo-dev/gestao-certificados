<?php

namespace App\Http\Controllers;

use App\Http\Requests\Student\StoreStudentRequest;
use App\Interfaces\Services\IStudentService;
use Illuminate\Http\RedirectResponse;
use Exception;

class StudentController extends Controller
{

    /** @var IStudentService  */
    private IStudentService $studentService;

    public function __construct(IStudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function registerStudentForm(){
        return view('students.register-student');
    }

    /**
     * @param StoreStudentRequest $request
     * @return RedirectResponse|void
     */
    public function store(StoreStudentRequest $request)
    {
        try{
            $student = $this->studentService->store($request['name'], $request['cpf']);

            return redirect()->route('profile.register.student');
        }catch(Exception $e){

        }
    }

    /**
     *
     */
    public function listStudents()
    {
        try{
            $students = $this->studentService->getAllStudents();

            return view('students.students', compact('students'));
        }catch(Exception $e){

        }
    }
}
