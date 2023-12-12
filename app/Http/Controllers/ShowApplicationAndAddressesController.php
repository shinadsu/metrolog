<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Application;
use App\Models\Statuses;
use App\Models\User;
use App\Services\UserRequisitesSettingsService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShowApplicationAndAddressesController extends Controller
{
    private $userRequisitesSettingsService; // Объявляем переменную как свойство класса

    public function __construct(UserRequisitesSettingsService $userRequisitesSettingsService)
    {
        $this->userRequisitesSettingsService = $userRequisitesSettingsService;
    }

    public function edit($id)
    {
        // Получите данные заявки по ID и передайте их в представление для редактирования
        $users = User::all()->where("id", 2);
        $address = Address::all();
        $status = Statuses::all();
        $application = Application::find($id);
        return view('applicationandaddressesUpdate', compact('application', 'status', 'users', 'address'));
    }

    public function update(Request $request, $id)
    {
        // Получаем данные из запроса
        $data = $request->all();

        // Правила валидации данных
        $validator = Validator::make($data, [
            'id' => 'required|integer',
            'fullname' => 'required|string',
            'user_id' => 'required|integer',
            'status_id' => 'required|integer',
            'type_of_payment' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
        ]);

        // Проверка валидации
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        try {
            // Начинаем транзакцию
            DB::beginTransaction();

            // Обновляем запись в таблице applications
            DB::table('applications')->where('id', $data['id'])->update([
                'fullname' => $data['fullname'],
                'user_id' => $data['user_id'],
                'status_id' => $data['status_id'],
                'type_of_payment' => $data['type_of_payment'],
            ]);

            // Обновляем запись в таблице addresses
            DB::table('addresses')->where('application_id', $data['id'])->update([
                'address' => $data['address'],
            ]);

            // Обновляем запись в таблице phones
            DB::table('phones')->where('application_id', $data['id'])->update([
                'phone_number' => $data['phone_number'],
            ]);

            // Если все операции выполнены успешно, подтверждаем транзакцию
            DB::commit();

            // Возвращаем подтверждение в виде JSON-ответа
            return response()->json(['message' => 'Данные успешно обновлены']);
        } catch (\Exception $e) {
            // В случае ошибки откатываем транзакцию
            DB::rollBack();

            // Возвращаем сообщение об ошибке в виде JSON-ответа
            return response()->json(['message' => 'Произошла ошибка при обновлении данных']);
        }
    }




    private function getApplicationsWithDetails($userRole)
    {
        return DB::table('address_applications')
            ->join('applications', 'address_applications.application_id', '=', 'applications.id')
            ->join('addresses', 'address_applications.address_id', '=', 'addresses.id')
            ->leftJoin('address_phone', 'address_applications.address_id', '=', 'address_phone.address_id')
            ->leftJoin('phones', 'address_phone.phone_id', '=', 'phones.id')
            ->leftJoin('statuses', 'applications.status_id', '=', 'statuses.id')
            ->leftJoin('users', 'applications.user_id', '=', 'users.id')
            ->select(
                'applications.id as application_id',
                'applications.fullname',
                'statuses.name as status_name',
                'applications.status_id as status_id',
                'applications.type_of_payment',
                'users.name as user_name',
                'applications.user_id as user_id',
                'addresses.full_address as address', 
                'phones.phone_number'
            )
            ->get();
    }

    public function index()
    {
        $user = Auth::user();
        $userRole = $user->role_id;
        $applicationsWithDetails = $this->getApplicationsWithDetails($userRole);

        $userRequisitesSettingsService = new UserRequisitesSettingsService();
    
        return view('applicationandaddresses', compact('applicationsWithDetails', 'userRole', 'userRequisitesSettingsService', 'user'));
    }



}
