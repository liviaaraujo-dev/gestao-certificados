<?php

namespace App\Http\Controllers;

use App\Interfaces\Services\IStudentService;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Exception;

class CertificateController extends Controller
{
    /** @var IStudentService $studentService */
    private IStudentService $studentService;

    /** @param IStudentService $studentService */
    public function __construct(IStudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * @return View
     */
    public function certificateForm(): View
    {
        try{
            $students = $this->studentService->getAllStudents();

            return view('certificates.generate-certificate', compact('students'));

        }catch (Exception $exception){
            Log::error('Erro ao carregar form: '.$exception->getMessage());
            return view('errors.500', [], 500);
        }
    }
}
