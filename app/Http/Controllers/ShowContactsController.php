<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;

class ShowContactsController extends Controller
{
    public function index()
    {
        $phones = Phone::all(); // Получаем все записи из таблицы "addresses"
        return view('contacts', compact('phones'));
    }
}
