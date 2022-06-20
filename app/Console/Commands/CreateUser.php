<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

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
        $name = $this->ask('name');
        $address = $this->ask('address');
        $email = $this->ask('email');
        $password = $this->secret('password');
        $admin = $this->choice('O usuário deve ser um admin?', ['Sim', 'Não'], 1);

        $admin = $admin == 'Sim';

        $bar = $this->output->createProgressBar(1);

        User::create([
            'name' => $name,
            'address' => $address,
            'email' => $email,
            'password' => Hash::make($password),
            'admin' => $admin,
        ]);

        $bar->advance();
        $this->newLine();

        $this->info('Usuário criado com sucesso!');



        return 0;
    }
}
