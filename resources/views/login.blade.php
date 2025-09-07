@extends('layout.principal')


@section('content')
 <form action="/loginAccount" method="post" novalidate class="w-100 w-md-50 mx-auto p-4 border rounded shadow-sm bg-light">
  @csrf
  
  <!-- Usuário -->
  <div class="mb-3">
    <label for="usuario" class="form-label">Usuário</label>
    <input type="text" 
           id="usuario" 
           name="usuario" 
           class="form-control @error('usuario') is-invalid @enderror"
           value="{{ old('usuario') }}" 
           placeholder="Digite seu usuário">
    @error('usuario')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <!-- Senha -->
  <div class="mb-3">
    <label for="senha" class="form-label">Senha</label>
    <input type="password" 
           id="senha" 
           name="senha" 
           class="form-control @error('senha') is-invalid @enderror"
           placeholder="Digite sua senha">
    @error('senha')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <!-- Botão -->
  <div class="d-grid">
    <button type="submit" class="btn btn-primary">
      <i class="fa fa-sign-in-alt"></i> Entrar
    </button>
  </div>
</form>

<!-- Mensagem de erro geral -->
@if(session('loginError'))
  <div class="alert alert-danger mt-3">
    <i class="fa fa-exclamation-circle"></i> {{ session('loginError') }}
  </div>
@endif

@endsection