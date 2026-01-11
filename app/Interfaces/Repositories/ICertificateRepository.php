<?php

namespace App\Interfaces\Repositories;

use App\Models\Certificate;
use Illuminate\Support\Collection;

interface ICertificateRepository{

    /**
     * @return Collection<int, Certificate>
     */
    public function getAllCertificates(): Collection;

    /**
     * @param int $certificateId
     * @return Certificate
     */
    public function getCertificateById(int $certificateId): Certificate;

    /**
     * @param int $studentId
     * @return Certificate
     */
    public function store(int $studentId): Certificate;

}
