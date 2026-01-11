<?php

namespace App\Interfaces\Services;

use App\Models\Certificate;
use Illuminate\Support\Collection;
use Exception;

interface ICertificateService
{
    /**
     * @return Collection<int, Certificate>
     * @throws Exception
     */
    public function getAllCertificates(): Collection;

    /**
     * @param int $certificateId
     * @return Certificate
     * @throws Exception
     */
    public function getCertificateById(int $certificateId): Certificate;

    /**
     * @param int $studentId
     * @param array $activities
     * @return Certificate
     * @throws Exception
     */
    public function store(int $studentId,  array $activities): Certificate;

}
