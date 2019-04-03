<?php declare(strict_types = 1);

namespace App\Http\Controllers\Logo;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Logo\Interfaces\CreateLogoServiceInterface;
use App\Logo;
use App\Requests\CreateLogoValidation;

class CreateController extends Controller
{    
    /**
     * @var App\Services\Logo\Interfaces\CreateLogoServiceInterface
     */
    private $createLogo;


    public function __construct(CreateLogoServiceInterface $createLogo)
    {
        $this->createLogo = $createLogo;
    }

    /**
     * create and upload a new image for the site
     */
    public function store(CreateLogoValidation $request): JsonResponse
    {
        $file = $request->file('file');

        return response()->json([
            'site_image' => $this->createLogo->create([
                'name' => $request->file('file')->store(Logo::IMAGE_UPLOAD_DIRECTORY),
            ]),
        ], 200);       
    }
}