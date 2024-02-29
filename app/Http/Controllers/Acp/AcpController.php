<?php

namespace App\Http\Controllers\Acp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AcpController extends Controller
{
    public function index(Request $request): View
    {
        return view('acp.index');
    }
}