<?php

namespace App\Services;

use App\Interfaces\Repositories\ICertificateRepository;
use App\Interfaces\Repositories\ITaskRepository;
use App\Interfaces\Services\ICertificateService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\Certificate;
use Exception;

class CertificateService implements ICertificateService
{

    /** @var ICertificateRepository $certificateRepository */
    private ICertificateRepository $certificateRepository;
    /** @var ITaskRepository $taskRepository */
    private ITaskRepository $taskRepository;

    /**
     * @param ICertificateRepository $certificateRepository
     * @param ITaskRepository $taskRepository
     */
    public function __construct(ICertificateRepository $certificateRepository, ITaskRepository $taskRepository){
        $this->certificateRepository = $certificateRepository;
        $this->taskRepository = $taskRepository;
    }

    /**
     * @return Collection<int, Certificate>
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

    /**
     * @param int $certificateId
     * @return Certificate
     * @throws Exception
     */
    public function getCertificateById(int $certificateId): Certificate
    {
        try{
            return $this->certificateRepository->getCertificateById($certificateId);

        }catch(Exception $exception){
            Log::error('Erro ao buscar certificado: ' . $exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            throw $exception;
        }
    }

    /**
     * @param int $studentId
     * @param array $activities
     * @return Certificate
     * @throws Exception
     */
    public function store(int $studentId, array $activities): Certificate
    {
        try{
            DB::beginTransaction();

            $certificate = $this->certificateRepository->store($studentId);
            $taskIds = [];

            foreach ($activities as $activity) {
                $task = $this->taskRepository->store($activity);
                $taskIds[] = $task->id;
            }

            $certificate->tasks()->sync($taskIds);

            DB::commit();

            return $certificate;

        }catch(Exception $exception){
            DB::rollBack();
            Log::error('Erro ao gerar certificado: ' . $exception->getMessage() . ' - ' . $exception->getLine() . ' - ' . $exception->getFile());
            throw $exception;
        }
    }

}
