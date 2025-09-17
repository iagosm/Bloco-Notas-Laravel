<?php

namespace App\Http\Controllers;

use App\Models\Note;
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
    $notes = User::find($id)->notes()->whereNull('deleted_at')->get()->toArray();
    return view('home', ['notes' => $notes]);
  }

  public function newNote()
  {
    return view('new_note');
  }

  public function newNoteSubmit(Request $request)
  {
    $request->validate(
      [
        'title' => 'required|min:3|max:200',
        'note' => 'required|min:3|max:3000',
      ],
      [
        'title.required' => 'Necessário preencher o título',
        'title.min' => 'O título deve ter no mínimo 3 caracteres',
        'title.max' => 'O título pode ter no máximo 200 caracteres',

        'note.required' => 'Necessário preencher a nota',
        'note.min' => 'A nota deve ter no mínimo 3 caracteres',
        'note.max' => 'A nota pode ter no máximo 3000 caracteres',
      ]
    );
    $id = session('user')['id'] ?? 0;
    $note = new Note();
    $note->user_id = $id;
    $note->title = $request->title;
    $note->text = $request->note;
    $note->save();
    return redirect()->route('home');
  }

  public function editNote($id)
  {
    $id = Operations::decryptId($id);
    if($id === null) {
      return redirect()->route('home');
    }
    $note = Note::find($id);
    return view('edit_note', ['note' => $note]);
  }

  public function editNoteSubmit(Request $request)
  {
    $request->validate(
      [
        'note_id' => 'required',
        'title' => 'required|min:3|max:200',
        'note' => 'required|min:3|max:3000',
      ],
      [
        'title.required' => 'Necessário preencher o titulo',
        'title.min' => 'Necessário ter o minino de 3 caracteres',
        'note.min' => 'Necessário ter o minino de 3 caracteres',
      ]
    );
    $id = Operations::decryptId($request->note_id);
    if($id === null) {
      return redirect()->route('home');
    }
    $note = Note::find($id);
    $note->title =$request->title;
    $note->text = $request->note;
    $note->save();
    return redirect()->route('home');
    // $id = Operations::decryptId($id);
    // $note = Note::find($id);
    // return view('edit_note', ['note' => $note]);
  }

  public function deleteNote($id)
  {
    $id = Operations::decryptId($id);
    if($id === null) {
      return redirect()->route('home');
    }
    $note = Note::find($id);
    return view('delete_note', ['note' => $note]);
  }

  public function deleteNoteSubmit(Request $request)
  {
    $request->validate(
      [
        'note_id' => 'required'
      ]
      );
      $id = Operations::decryptId($request->note_id);
      if($id === null) {
        return redirect()->route('home');
      }
      $note = Note::find($id);
      // $note->delete();
      // $note->deleted_at = date('Y-m-d H:i:s');
      // $note->save();
      $note->delete();
      return redirect()->route('home');
    // $id = Operations::decryptId($id);
    // $note = Note::find($id);
    // return view('delete_note', ['note' => $note]);
  }
}
