<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class FileController extends Controller
{
    public function index (Request $request) {

        $name = '';

        $user3 = User::all();

        $context = [
            'file_title'=> 'file',
            'user'=> $user3
        ];
        return view('index', $context);
    }

    public function save_file (Request $request) {
        $file = $request->file('file');
        $file_name = $file->getClientOriginalName();
        $file_path = $file->getPathname();

        $file->move('assets/media', $file_name);

        $context = [
            'file_name'=> $file_name,
            'file_path'=> $file_path,
            'file_title'=> 'file'
        ];

        return redirect()->route('index');
    }
}
