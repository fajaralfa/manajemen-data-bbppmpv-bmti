<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buat user admin baru';

    /**
     * Execute the console command.
     */
    public function handle(User $user)
    {
        $user = new User();

        $user->name = $this->ask('Nama Lengkap');
        $user->username = $this->ask('Username');
        $user->password = $this->ask('Password');
        $user->role = 'admin';

        $user->save();

        echo 'User berhasil disimpan.\n';
    }
}
