<?php

namespace App\Contracts;

use Illuminate\View\View;

interface ControllerInterface
{
    public function entity(): string;

    public function index(): View;

}
