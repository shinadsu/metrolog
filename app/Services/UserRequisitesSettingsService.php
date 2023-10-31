<?php

namespace App\Services;

use App\Models\CreateUserRequisitesSettingsTable;
use Illuminate\Support\Facades\Auth;

class UserRequisitesSettingsService
{
    public function canViewPhoneNumberAndAddress($userRoleId, $applicationUserId, $statusId)
    {
        // Получаем настройки для роли пользователя, определенной в таблице users для поля 'phone_number'
        $phoneRule = CreateUserRequisitesSettingsTable::where('role_id', $userRoleId)
            ->where('propses_id', 22) // Идентификатор для 'phone_number'
            ->where('status_id', $statusId)
            ->first();

        // Получаем настройки для роли пользователя, определенной в таблице users для поля 'address'
        $addressRule = CreateUserRequisitesSettingsTable::where('role_id', $userRoleId)
            ->where('propses_id', 4) // Идентификатор для 'address' (обновьте это, если необходимо)
            ->where('status_id', $statusId)
            ->first();

        // Если настройки не найдены или отключены, не отображаем номер телефона и адрес
        if ((!$phoneRule || !$phoneRule->setting_enabled) && (!$addressRule || !$addressRule->setting_enabled)) {
            return ['phone_number' => false, 'address' => false];
        }

        // Проверяем доступ к номеру телефона в зависимости от типа доступа
        $phoneAccess = $this->checkAccess($phoneRule, $applicationUserId);

        // Проверяем доступ к адресу в зависимости от типа доступа
        $addressAccess = $this->checkAccess($addressRule, $applicationUserId);

        return ['phone_number' => $phoneAccess, 'address' => $addressAccess];
    }

    private function checkAccess($rule, $applicationUserId)
    {
        // Если правило не найдено или отключено, не отображаем
        if (!$rule || !$rule->setting_enabled) {
            return false;
        }

        // Проверяем доступ в зависимости от типа доступа
        switch ($rule->access_type) 
        {
            case 'hidden':
                return false; // 'hidden' - не отображать
            case 'required':
                // Проверяем, принадлежит ли заявка этому пользователю
                return ($rule->own_requests_allowed && $applicationUserId == Auth::id());
            case 'disabled':
                // Проверяем, доступно ли для чужих заявок
                return ($rule->others_requests_allowed || $rule->own_requests_allowed && $applicationUserId == Auth::id());
            default:
                return false;
        }
    }
}
