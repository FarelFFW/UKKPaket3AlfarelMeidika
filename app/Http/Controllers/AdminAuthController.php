<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    public function login(AdminLoginRequest $request): JsonResponse|RedirectResponse
    {
        if (! Auth::guard('admin')->attempt($request->validated())) {
            throw ValidationException::withMessages([
                'username' => ['Username atau password salah.'],
            ]);
        }

        $request->session()->regenerate();

        if (! $request->expectsJson()) {
            return redirect()->intended(route('admin.dashboard'));
        }

        return response()->json([
            'admin' => Auth::guard('admin')->user(),
        ]);
    }

    public function me(Request $request): JsonResponse
    {
        return response()->json([
            'admin' => $request->user('admin'),
        ]);
    }

    public function logout(Request $request): JsonResponse|RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (! $request->expectsJson()) {
            return redirect()->route('admin.login.form');
        }

        return response()->json([
            'message' => 'Logout berhasil.',
        ]);
    }
}
