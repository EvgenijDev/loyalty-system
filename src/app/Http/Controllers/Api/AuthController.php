<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\PhoneVerification;

class AuthController extends Controller
{



 // Шаг 1: Отправка кода на email
    public function sendEmailCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email'
        ]);

        // Генерируем 6-значный код
        $code = rand(100000, 999999);
        
        // Сохраняем код в кэш на 10 минут
        Cache::put('email_code_' . $request->email, $code, now()->addMinutes(10));
        
        // Устанавливаем лимит отправки (раз в минуту)
        if (Cache::has('email_throttle_' . $request->email)) {
            return response()->json([
                'message' => 'Подождите минуту перед повторной отправкой'
            ], 429);
        }
        
        Cache::put('email_throttle_' . $request->email, true, now()->addMinute());

        // Отправляем код на почту
        Mail::raw("Ваш код подтверждения: {$code}", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Код подтверждения регистрации');
        });

        return response()->json([
            'message' => 'Код отправлен на почту',
            'email' => $request->email
        ]);
    }

    public function verifyEmailCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|string|size:6'
        ]);

        $savedCode = Cache::get('email_code_' . $request->email);
        
        if (!$savedCode || $savedCode != $request->code) {
            return response()->json([
                'message' => 'Неверный или истекший код'
            ], 422);
        }

        // Генерируем временный токен для регистрации
        $registrationToken = Str::random(60);
        Cache::put('registration_token_' . $request->email, $registrationToken, now()->addMinutes(15));
        Cache::forget('email_code_' . $request->email);

        return response()->json([
            'message' => 'Код подтвержден',
            'registration_token' => $registrationToken
        ]);
    }

    // Шаг 3: Завершение регистрации
    public function registerWithEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'registration_token' => 'required|string',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed'
        ]);

        // Проверяем токен
        $savedToken = Cache::get('registration_token_' . $request->email);
        if (!$savedToken || $savedToken != $request->registration_token) {
            return response()->json([
                'message' => 'Недействительный токен регистрации'
            ], 422);
        }

        // Создаем пользователя
        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email_verified_at' => now() // Сразу верифицируем email
        ]);

        // Удаляем временный токен
        Cache::forget('registration_token_' . $request->email);

        // Авторизуем пользователя
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'message' => 'Регистрация успешна',
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function saveCode(Request $request)
    {
        PhoneVerification::updateOrCreate(
            [
                'phone' => $request->phone,
            ],
            [
                'code' => Hash::make($request->code),
                'expires_at' => now()->addMinutes(2),
                'attempts' => 0,
            ]
        );
    }

    public function checkCode(Request $request)
    {
        $verification = PhoneVerification::query()
            ->where('phone', $request->phone)
            ->first();

        if (
            !$verification ||
            !Hash::check($request->code, $verification->code)
        ) {
            return response()->json([
                'message' => 'Invalid code',
            ], 422);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $request->session()->regenerate();

        return response()->json([
            'user' => Auth::user(),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
        ]);
    }
}