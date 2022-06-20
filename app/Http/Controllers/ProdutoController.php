<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProdutoController extends BaseController
{

    public function entity(): string
    {
        return Produto::class;
    }

    public function index(): View
    {
        return view('adminPages.produtos', ['produtos' => $this->entity->all()]);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $file = Storage::disk('public')->put('produtos/fotos', $data['foto'], 'public');

        $data['foto'] = $file;

        $this->entity->create($data);
        return $this->index();
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if($request->hasFile('foto')){
            $file = Storage::disk('public')->put('produtos/fotos', $data['foto'], 'public');

            $data['foto'] = $file;
        }
        $this->entity->findOrFail($id)->update($data);
        return $this->index();

    }

    public function getOne(int $id)
    {
        $produto = $this->entity->findOrFail($id);
        return view('adminPages.updateProduto', ['produto' => $produto]);
    }
}
