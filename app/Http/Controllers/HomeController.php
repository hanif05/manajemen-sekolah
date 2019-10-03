<?php

namespace App\Http\Controllers;

use App\User;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.home.index');
    }

    public function dataTable()
    {
        $data = User::query();

        return DataTables::of($data)->addIndexColumn()->make(true);
    }
}
