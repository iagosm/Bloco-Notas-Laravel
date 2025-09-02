<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
  public function index()
  {
    echo 'Dentro do aplicativo';
  }

  public function newNote()
  {
    echo 'nova nota';
  }
}
