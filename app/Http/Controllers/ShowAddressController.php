<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class ShowAddressController extends Controller
{
    public function index()
    {
        $addresses = Address::all(); // Получаем все записи из таблицы "addresses"
        return view('addresses', compact('addresses'));
    }
}
