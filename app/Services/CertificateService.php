<?php

namespace App\Services;

use App\Interfaces\Repositories\ICertificateRepository;
use App\Interfaces\Services\ICertificateService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use Exception;

class CertificateService implements ICertificateService
{

    /** @var ICertificateRepository $certificateRepository */
    private ICertificateRepository $certificateRepository;

    /** @param ICertificateRepository $certificateRepository */
    public function __construct(ICertificateRepository $certificateRepository){
        $this->certificateRepository = $certificateRepository;
    }

    /**
     * @return Collection
     * @throws Exception
     */
    public function getAllCertificates(): Collection
    {
        try{
            return $this->certificateRepository->getAllCertificates();

        }catch (Exception $exception){
            Log::error('Erro ao buscar todos os certificados: ' . $exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            throw $exception;
        }
    }

}
