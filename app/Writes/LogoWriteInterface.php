<?php

declare(strict_types = 1);

namespace App\Writes;

use App\Logo;

interface LogoWriteInterface
{
    public function with(Logo $logo, array $requestData);

    /**
     * set uploaded image filename
     *
     */
    public function save(): void;

    /**
     * returns updated logo object
     *
     */
    public function getLogo(): Logo;

}