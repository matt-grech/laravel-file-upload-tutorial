<?php

declare(strict_types = 1);

namespace App\Services\Logo\Interfaces;

use App\Logo;

interface CreateLogoServiceInterface
{

    public function create(array $requestData): Logo;

}
