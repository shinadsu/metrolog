<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

class addRoleToUserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $usersWithoutRole = User::whereNull('role_id')->get();
        $usersWithRoles = User::with('role')->get();
        return view('addRoleToUser', compact('roles', 'usersWithoutRole', 'usersWithRoles'));
    }

    public function update(Request $request)
    {
        // Валидация данных
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        // Получаем пользователя
        $user = User::find($request->input('user_id'));

        // Проверяем, существует ли пользователь
        if (!$user) {
            return redirect()->back()->with('error', 'Пользователь не найден');
        }

        // Присваиваем выбранную роль пользователю
        $user->update([
            'role_id' => $request->input('role_id'),
        ]);

        // Перенаправляем обратно с успешным сообщением
        return redirect()->back()->with('success', 'Роль успешно добавлена пользователю');
    }

}


