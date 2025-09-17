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
    <div class="note-card shadow-sm p-3 rounded mb-3 bg-light">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h4 class="note-title mb-0">Note Title</h4>
            <div class="note-actions d-flex gap-2">
                <button class="btn btn-outline-secondary btn-sm"><i class="fa fa-pen"></i></button>
                <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
            </div>
        </div>
        <p class="note-meta text-muted small">Criado em: <strong>00/00/0000 00:00:00</strong></p>
        <hr>
        <p class="note-text text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia temporibus necessitatibus nesciunt quam repellat porro commodi.</p>
    </div>
@else
    <div class="row">
        @foreach ($notes as $note)
            <div class="col-md-6 col-lg-4 mb-4">
                @include('note')
            </div>
        @endforeach
    </div>
@endif

  </main>
@endsection