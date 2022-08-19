<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function Check_login_users_job()
    {
        // Consulta para traer todos los usuarios
        $users = User::all();
        //Recorrido de la consulta a cada usuario para evaluar
        foreach ($users as $user) {

            //Armado de fechas para saber cual es la fecha de last login y el tiempo limite que son 30 dias asignados
            $last_login = Carbon::parse($user->last_login)->toDateTimeString();
            $limit_date = Carbon::now()->subDays(30)->toDateTimeString();

            // Se evalua si el ultimo login es menor o igual a 30 dias que es la fecha limite de ser positivo
            //se procede a ejecutar el envio del correo para informar que tiene mas de 30 dias que no inicia sesion
            if ($last_login <= $limit_date) {

                // Procedo a enviar la notificacion al usuario
                Mail::to($user->email)->send(new \App\Mail\NewMail($user));
            }
        }
    }
}
