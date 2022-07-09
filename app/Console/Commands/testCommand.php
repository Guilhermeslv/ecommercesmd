<?php

namespace App\Console\Commands;

use App\Http\Controllers\CarrinhoController;
use App\Models\Carrinho;
use App\Models\ItensCarrinho;
use Carbon\Carbon;
use Illuminate\Console\Command;

class testCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'function:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        dd(ItensCarrinho::delete());

        $data = [
            'produto_id' => 21,
            'quantidade' => 4,
        ];

        $cart = Carrinho::where('comprado', false)->first();

        if (empty($cart)){
            $cart = Carrinho::create([
                'data_hora' => Carbon::now(),
                'usuario_id' => 4,
                'comprado' => false
            ]);
        }

        $cartItem = $cart->itens()
            ->where('produto_id', $data['produto_id'])
            ->first();

        empty($cartItem)
            ? $cart->itens()->create($data)
            : $cartItem->update($data);


        dd($cart->refresh()->with('itens')->get());
    }

}
