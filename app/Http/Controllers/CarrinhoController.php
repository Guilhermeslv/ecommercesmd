<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\ItensCarrinho;
use App\Models\Produto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CarrinhoController extends BaseController
{
    public function entity(): string
    {
        return Carrinho::class;
    }

    public function index(): View
    {
        $cart = $this->entity->where([
            ['usuario_id', Auth::user()->id],
            ['comprado', false]
        ])->first();

        return view('cart', compact('cart'));
    }

    public function showFinishedCarts()
    {
        $cart = $this->entity->where([
            ['usuario_id', Auth::user()->id],
            ['comprado', true]
        ])->get();

        return view('comprasCliente', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        $data = $request->all();

        $product = Produto::find($data['produto_id']);

        if($product->quantidade < $data['quantidade']){
            return redirect()->route('home')->with('message', 'Quantidade insuficiente!');
        }else{
            $product->update([
                'quantidade' => $product->quantidade - $data['quantidade'],
            ]);
        }


        $cart = $this->entity->where([
            ['usuario_id', Auth::user()->id],
            ['comprado', false]
        ])->first();

        if (empty($cart)){
            $cart = $this->entity->create([
                'data_hora' => Carbon::now(),
                'usuario_id' => Auth::user()->id,
                'comprado' => false
            ]);

            $cart->itens()->create($data);
        }else{
            $cartItem = $cart->itens()
                ->where('produto_id', $data['produto_id'])
                ->first();

            if(!empty($cartItem)){
                $data['quantidade'] = $cartItem->quantidade + $data['quantidade'];
                $cartItem->update($data);
            }else{
                $cart->itens()->create($data);
            }

        }


        return redirect()->route('cart')->with('message', 'Produto adicionado no carrinho!');
    }

    public function updateCartItem(ItensCarrinho $item, Request $request)
    {
        $data = $request->all();

        $product = Produto::find($item->produto_id);

        if($product->quantidade < ($data['quantidade'] - $item->quantidade)){
            return redirect()->route('cart')->with('message', 'Quantidade insuficiente!');
        }else{
            $product->update(['quantidade' => $product->quantidade + ($item->quantidade - $data['quantidade'])]);
        }


        $item->update(['quantidade' => $data['quantidade']]);

        return redirect()->route('cart')->with('message', 'Quantidade alterada!');
    }

    public function removeToCart(ItensCarrinho $item)
    {
        $product = $item->produto;

        $product->update(['quantidade', $product->quantidade + $item->quantidade]);

        $item->delete();

        return redirect()->route('cart')->with('message', 'Produto removido do carrinho!');
    }

    public function finishCart()
    {
        $cart = $this->entity
            ->where([
                ['usuario_id', Auth::user()->id],
                ['comprado', false]
            ]);

        $cart->update(['comprado' => true]);

        return redirect()->route('home')->with('message', 'Carrinho finalizado! Agradecemos pela compra :)');
    }
}
