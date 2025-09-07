@extends('layout.principal')


@section('content')
  <header class="bg-dark text-white p-3 d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center gap-2">
      <i class="fa fa-user"></i>
      <span>Usuário: <strong>{{ session('user')['username'] }}</strong></span>
    </div>
    <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">
      <i class="fa fa-sign-out-alt"></i> Logout
    </a>
  </header>
  <main class="container my-5">
    <div class="mb-4 text-center">
      <h1>Crie Sua Nota</h1>
      @if (empty($notes))
        <span>Até o momento não existem notas criadas</span>
      @endif
    </div>
    <div class="text-center mb-4">
      <a href="{{ route('new') }}" class="btn btn-primary">
        <i class="fa fa-note-sticky"></i> Nova Nota
      </a>
    </div>
    @if (empty($notes))
      <div class="note-card">
        <div class="d-flex justify-content-between">
          <h4 class="note-title">Note Title</h4>
          <div class="note-actions d-flex gap-2">
            <button class="btn btn-secondary btn-sm"><i class="fa fa-pen"></i></button>
            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
          </div>
        </div>
        <p class="note-meta">Created at: <strong>00/00/0000 00:00:00</strong></p>
        <hr>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia temporibus necessitatibus nesciunt quam repellat porro commodi.</p>
      </div>
    @else
    @foreach ($notes as $note)
    @include('note')
    @endforeach
    @endif
  </main>
@endsection