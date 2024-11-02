<?php

namespace App\Services\Interfaces;

interface PipelineServiceInterface
{
    public function store(array|object $data): mixed;
}
