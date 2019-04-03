<?php

declare(strict_types = 1);

namespace App\Services\Logo\Classes;

use App\Logo;
use App\Writes\LogoWriteInterface;
use App\Services\Logo\Interfaces\CreateLogoServiceInterface;


class CreateLogoService implements CreateLogoServiceInterface
{
    /**
     * @var LogoWriteInterface
     */
    private $createLogo;

    /**
     * Constructor
     */
    public function __construct(LogoWriteInterface $createLogo)
    {
        $this->createLogo = $createLogo;
    }

    public function create(array $requestData): Logo
    {
        $create = $this->createLogo->with(new Logo, $requestData);
        $create->save();

        return $create->getLogo();
    }

}
