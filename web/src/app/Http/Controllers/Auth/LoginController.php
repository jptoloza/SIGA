<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use phpCAS;
use App\Events\SendCodeEvent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /**
     * 
     */
    public function __construct()
    {
        phpCAS::setLogger();
        phpCAS::setVerbose(true);
        phpCAS::client(CAS_VERSION_2_0, 'sso-lib.uc.cl', 443, '/cas', 'http://localhost:8080');
        phpCAS::setNoCasServerValidation();
 
        
        /*
        phpCAS::setLogger();
        phpCAS::setVerbose(true);
        // Configuraciones de CAS obtenidas de config/cas.php
        // TODO: Cambiar cas_client_service para producción
        phpCAS::client(CAS_VERSION_2_0,env('CAS_HOSTNAME'),(int) env('CAS_PORT'),env('CAS_URI'),env('CAS_CLIENT_SERVICE'));
        // Esto debe cambiarse para producción
        phpCAS::setNoCasServerValidation();
        */
    }


    /**
     * Index
     */
    public function Index()
    {
        if (Session::has('user_id')) {
            // Existe una sesión activa, redirigir a la página 'index'
            return redirect()->route('dashboard');
        }
        return view('login.index');
    }

    /**
     * loginUC
     */
    public function loginUC()
    {
        if (Session::has('user_id')) {
            // Existe una sesión activa, redirigir a la página 'index'
            return redirect()->route('dashboard');
        }

        if (!phpCAS::isAuthenticated()) {
            phpCAS::forceAuthentication();
        } else {
            // Se trae el usuario de cas, en caso de querer usar el run es carlicense
            $user = phpCAS::getUser();
            // Esto es una consulta simple para validar que el usuario exista en el sistema
            $getUser = User::where('login', '=', $user)
                ->where('activate', '=', '1')
                ->where('authentication', '=', 'SSO')
                ->first();

            if ($getUser == NULL) {
                phpCAS::logout();
            } else {
                // Usuario autenticado con éxito
                // Asignar valores a la variable de sesión
                // Acá se deberían agregar todas las variables necesarias para la sesión del usuario
                // Quizás a futuro agregar carrera en caso de que la tenga
                $user_name = $getUser->first_name . ' ' . $getUser->last_name_pathernal . ' ' . $getUser->last_name_maternal;
                session([
                    'user_id'       => $getUser->id,
                    'user_name'     => $user_name,
                    'user_login'    => $getUser->login,
                    'user_run'      => $getUser->run,
                    'user_auth'     => $getUser->authentication,
                ]);
                return redirect()->route('dashboard');
            }
        }
    }


    /**
     * validateLogin
     */
    public function validateLogin(Request $request)
    {
        if (Session::has('user_id')) {
            // Existe una sesión activa, redirigir a la página 'index'
            return redirect()->route('dashboard');
        }
        // Validar el login y obtener el usuario
        $getUser = User::where('login', $request->input('login'))
            ->where('activate', '=', '1')
            ->first();
        if ($getUser) {
            if ($getUser->authentication === 'SSO') {
                // Redirigir a la vista de loginuc
                return response()->json([
                    'success'   => 'ok',
                    'redirect'  => 1,
                    'data'      => $getUser
                ]);
            } else {
                return response()->json([
                    'success'   => 'ok',
                    'redirect'  => 2,
                    'data'      => $getUser
                ]);
            }
            return response()->json([
                'success'   => 'ok',
                'data'      => $getUser
            ]);
        } else {
            return response()->json([
                'success'   => 'error',
                'message'   => 'Usuario no registrado.'
            ], 401);
        }
    }



    /**
     * validate password for local user
     */
    public function validatePasswd  (Request $request)
    {
        if (Session::has('user_id')) {
            // Existe una sesión activa, redirigir a la página 'index'
            return redirect()->route('dashboard');
        }
        // Validar el login y obtener el usuario
        $getUser = User::where('login', $request->input('login'))
            ->where('activate', '=', '1')
            ->first();

        if (!$getUser || $getUser->authentication !== 'LOCAL') {
            // No se encontró el usuario o la autenticación no es LOCAL
            return response()->json([
                'success'   => 'error',
                'message'   => 'Usuario no registrado.'
            ], 401);
        }

        // Verificar la contraseña
        if (!Hash::check($request->input('passwd'), $getUser->password)) {
            // La contraseña no es válida
            return response()->json([
                'success'   => 'error',
                'message'   => 'Usuario ó Contraseña no valida.'
            ], 401);
        } else {

            // Generar un string aleatorio para two_auth_factor
            $code = mb_convert_case(Str::random(10), MB_CASE_UPPER); //0O 1l ñ
            // Actualizar el campo two_auth_factor
            $getUser->auth_two_factor = $code;
            $getUser->save();
            SendCodeEvent::dispatch($getUser);
            return response()->json([
                'success'   => 'ok',
                'data'      => $getUser
            ]);
        }
    }



    /**
     * valida code
     */
    public function validateCode(Request $request)
    {
        if (Session::has('user_id')) {
            // Existe una sesión activa, redirigir a la página 'index'
            return redirect()->route('dashboard');
        }
        // Validar el login y obtener el usuario
        $getUser = User::where('login', $request->input('login'))
            ->where('activate', '=', '1')
            ->first();

        if (!$getUser || $getUser->authentication !== 'LOCAL') {
            // No se encontró el usuario o la autenticación no es LOCAL
            return response()->json([
                'success'   => 'error',
                'message'   => 'Usuario no registrado.'
            ], 401);
        }

        if ($getUser->auth_two_factor == $request->input('code')) {
            $user_name = $getUser->first_name . ' ' . $getUser->last_name_pathernal . ' ' . $getUser->last_name_maternal;
            session([
                'user_id'       => $getUser->id,
                'user_name'     => $user_name,
                'user_login'    => $getUser->login,
                'user_run'      => $getUser->run,
                'user_auth'     => $getUser->authentication,
            ]);
            return response()->json([
                'success'   => 'ok',
                'data'      => $getUser
            ]);
        } else {
            return response()->json([
                'success'   => 'error',
                'message'   => 'Código no válido.'
            ], 401);
        }
    }


    /**
     * logout
     */
    public function logout(Request $request)
    {
        // Obtener el tipo de autenticación de la sesión
        $authenticationType = Session::get('user_auth', '');
        // Borrar todos los datos de la sesión
        Session::flush();
        // Redirigir según el tipo de autenticación

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (phpCAS::isAuthenticated()) {
            phpCAS::logoutWithRedirectService('http://localhost;8080');
        }
        /*
        if ($authenticationType == 'SSO') {
            phpCAS::logoutWithRedirectService('http://localhost;8080');

            phpCAS::logout();
        } */ else {
            return redirect()->route('login');
        }
    }

}
