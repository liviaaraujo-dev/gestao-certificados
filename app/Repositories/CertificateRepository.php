<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ICertificateRepository;
use App\Models\Certificate;
use Illuminate\Support\Collection;

class CertificateRepository implements ICertificateRepository
{
    /** @var Certificate $certificate  */
    private Certificate $certificate;

    /**
     * @param Certificate $certificate
     */
    public function __construct(Certificate $certificate)
    {
        $this->certificate = $certificate;
    }

    /**
     * @return Collection<int, Certificate>
     */
    public function getAllCertificates(): Collection
    {
        return $this->certificate->all();
    }

    /**
     * @param int $certificateId
     * @return Certificate
     */
    public function getCertificateById(int $certificateId): Certificate
    {
        return $this->certificate->find($certificateId);
    }

    /**
     * @param int $studentId
     * @return Certificate
     */
    public function store(int $studentId): Certificate
    {
        return $this->certificate->create([
            'student_id' => $studentId,
        ]);
    }
}
