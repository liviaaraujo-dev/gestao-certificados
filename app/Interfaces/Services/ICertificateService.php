<?php

namespace App\Interfaces\Services;

use Illuminate\Support\Collection;
use Exception;

interface ICertificateService
{
    /**
     * @return Collection
     * @throws Exception
     */
    public function getAllCertificates(): Collection;

}
