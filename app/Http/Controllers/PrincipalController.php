<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Operations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class PrincipalController extends Controller
{
  public function index()
  {
    $id = session('user.id');
    $notes = User::find($id)->notes()->get()->toArray();
    return view('home', ['notes' => $notes]);
  }

  public function newNote()
  {
    echo 'nova nota';
  }

  public function editNote ($id)
  {
    $id = Operations::decryptId($id);
    
  }

  public function deleteNote($id)
  {
    $id = Operations::decryptId($id);
  }
}
