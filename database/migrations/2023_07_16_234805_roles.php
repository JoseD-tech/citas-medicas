<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Crea los Roles
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'doctor']);
        $role3 = Role::create(['name' => 'secretario']);

        // Usuarios de Prueba admin/usuario
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'doctor',
            'email' => 'doctor@gmail.com',
            'password' => Hash::make('doctor123'),
        ]);

        User::create([
            'name' => 'secretario',
            'email' => 'secretario@gmail.com',
            'password' => Hash::make('secretario123'),
        ]);

        $user = User::find(1);
        $user->assignRole($role1);

        $user2 = User::find(2);
        $user2->assignRole($role2);

        $user3 = User::find(3);
        $user3->assignRole($role3);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
