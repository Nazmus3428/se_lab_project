<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        // dd(Hash::make('password'));
        $this->middleware('guest')->except('logout');
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if (getLoggedInUser()->email_verified_at == null) {
            $userEmail = getLoggedInUser()->email;
            auth()->logout();
            Flash::error(__('messages.verification.verify_your_email_address'));

            return redirect('login');
        }

        if ($request->user()->hasRole('Admin')) {
            $this->redirectTo = 'dashboard';
        } else {
            if ($request->user()->hasRole(['Receptionist'])) {
                $this->redirectTo = 'appointments';
            } elseif ($request->user()->hasRole(['Doctor', 'Case Manager', 'Lab Technician', 'Pharmacist'])) {
                $this->redirectTo = 'employee/doctor';
            } elseif ($request->user()->hasRole(['Patient'])) {
                $this->redirectTo = 'patient/my-cases';
            } elseif ($request->user()->hasRole(['Nurse'])) {
                $this->redirectTo = 'bed-types';
            } elseif ($request->user()->hasRole(['Accountant'])) {
                $this->redirectTo = 'accounts';
            } else {
                $this->redirectTo = 'employee/notice-board';
            }
        }

        if (! isset($request->remember)) {
            return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath())
                    ->withCookie(Cookie::forget('email'))
                    ->withCookie(Cookie::forget('password'))
                    ->withCookie(Cookie::forget('remember'));
        }

        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath())
                ->withCookie(Cookie::make('email', $request->email, 3600))
                ->withCookie(Cookie::make('password', $request->password, 3600))
                ->withCookie(Cookie::make('remember', 1, 3600));
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/login');
    }
}
