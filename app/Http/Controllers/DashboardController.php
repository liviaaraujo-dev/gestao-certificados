<?php

namespace App\Http\Controllers;

use App\Interfaces\Services\ICertificateService;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Exception;

class DashboardController extends Controller
{

    /** @var ICertificateService $certificateService */
    private ICertificateService $certificateService;

    /**
     * @param ICertificateService $certificateService
     */
    public function __construct(ICertificateService $certificateService)
    {
        $this->certificateService = $certificateService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
       try{
           $certificates = $this->certificateService->getAllCertificates();

           return view('dashboard', compact('certificates'));

       }catch (Exception $exception){
           Log::error('Erro ao carregar dashboard: '.$exception->getMessage());
           return view('errors.500',500);
       }
    }
}
