<?php

use App\Models\Cita;
use Inertia\Inertia;
use App\Models\Paciente;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\SecretatioController;
use App\Models\Historial;
use Spatie\Permission\Middlewares\RoleMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Auth/Login');
});

Route::get('/dashboard', function () {

    $rolDoctor = Role::where('name', 'doctor')->first();
    $rolSecretario = Role::where('name', 'secretario')->first();

    $historial = Historial::with('HistoriaPaciente')->get();
    $citas = Cita::all()->count();
    $pacientes = Paciente::all()->count();
    $numeroDoctores = $rolDoctor->users()->count();
    $numeroSecretario = $rolSecretario->users()->count();

    return Inertia::render('Dashboard', [
        'citas' => $citas,
        'pacientes' => $pacientes,
        'doctores' => $numeroDoctores,
        'secretario' => $numeroSecretario,
        'historial' => $historial
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas protegidas por roles

    // Rol Admin
    Route::middleware('role:admin')->group(function () {
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('users', [UserController::class, 'store'])->name('users.store');
        Route::delete('users/{users}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Rol Doctor
    Route::middleware('role:admin|doctor')->group(function () {
        Route::resource('/doctor', DoctorController::class);
    });

    //Rol secretrario
    Route::middleware('role:admin|secretario')->group(function () {
        Route::resource('/secretario', SecretatioController::class);
    });

    Route::resource('/paciente', PacienteController::class);
    Route::resource('/citas', CitaController::class);
    Route::get('/citas/export', [CitaController::class, 'export'])->name('citas.export');
});

require __DIR__ . '/auth.php';
