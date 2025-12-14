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
     * @return Collection
     */
    public function getAllCertificates(): Collection
    {
        return $this->certificate->all();
    }
}
