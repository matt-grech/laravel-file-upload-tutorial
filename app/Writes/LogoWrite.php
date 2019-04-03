<?php

declare(strict_types = 1);

namespace App\Writes;

use Log;
use App\Exceptions\SaveRecordException;
use App\Writes\LogoWriteInterface;
use App\Logo;

class LogoWrite implements LogoWriteInterface
{
	/**
     * @var Logo
     */
    private $logo;

    /**
     * @var array
     */
    private $requestData;


    public function with(Logo $logo, array $requestData): self
    {
        $this->logo = $logo;
        $this->requestData = $requestData;

        return $this;
    }

    /**
     * set uploaded image filename
     *
     */
    public function save(): void
    {
        try {
            if($this->requestData['name']) {
                $name = explode("/", $this->requestData['name']);
                $this->logo->name = end($name);
            }
            
            $this->logo->save();
        }
        catch (\Exception $e) {
            Log::error($e->getMessage() . " " . get_class($this) . " " . __METHOD__ . " " . __LINE__);
            
            throw new SaveRecordException('This record cannot be saved! ' . $e->getMessage()); //400
        }
    }


    /**
     * returns updated logo object
     *
     */
    public function getLogo(): Logo
    {
        return $this->logo;
    }
}