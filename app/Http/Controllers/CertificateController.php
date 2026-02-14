<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertificateRequest;
use App\Interfaces\Services\ICertificateService;
use App\Interfaces\Services\IStudentService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Exception;

class CertificateController extends Controller
{
    /** @var IStudentService $studentService */
    private IStudentService $studentService;
    /** @var ICertificateService $certificateService */
    private ICertificateService $certificateService;

    /**
     * __construct
     * @param IStudentService $studentService
     * @param ICertificateService $certificateService
     */
    public function __construct(IStudentService $studentService, ICertificateService $certificateService)
    {
        $this->studentService = $studentService;
        $this->certificateService = $certificateService;
    }

    /**
     * @return View|Response
     */
    public function certificateForm(): View|Response
    {
        try{
            $students = $this->studentService->getAllStudents();

            return view('certificates.generate-certificate', compact('students'));

        }catch (Exception $exception){
            Log::error('Erro ao carregar form: '.$exception->getMessage());
            return response()->view('errors.500', [], 500);
        }
    }

    /**
     * @param string $certificateId
     * @return View
     * @throws Exception
     */
    public function showCertificate(string $certificateId): View
    {
        $certificate = $this->certificateService->getCertificateById(decrypt($certificateId));

        return view('certificates.certificate', compact('certificate'));
    }

    /**
     * @param StoreCertificateRequest $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function store(StoreCertificateRequest $request): RedirectResponse
    {
        $certificate = $this->certificateService->store($request->input('student_id'), $request->input('activities'));

        return redirect()
            ->route('certificate.show', encrypt($certificate->id))
            ->with('success', 'Certificado cadastrado com sucesso!');
    }
}
