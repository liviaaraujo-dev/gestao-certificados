<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    private StudentService $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function certificateForm()
    {
        $students = $this->studentService->getAllStudents();

        return view('certificates.generate-certificate', compact('students'));
    }
}
