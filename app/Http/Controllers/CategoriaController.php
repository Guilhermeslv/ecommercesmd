<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriaController extends BaseController
{
    public function entity(): string
    {
        return Categoria::class;
    }

    public function index(): View
    {
        return view('adminPages.categorias', ['categorias' => $this->entity->all()]);
    }
}
