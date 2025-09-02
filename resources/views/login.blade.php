@extends('layout.principal')


@section('content')
  <form action="/loginAccount" method="post" novalidate>
    @csrf
    <div>
      <label for="usuario">Usuário:</label>
      <input type="text" id="usuario" name="usuario" value="{{ old('usuario') }}" />
      @error('usuario1')
         <span>{{ $message }}</span>
      @enderror
    </div>
    <div>
      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" value="{{ old('senha ') }}" />
      @error('senha2')
         <span>{{ $message }}</span>
      @enderror
    </div>
    <div>
      <button type="submit">Entrar</button>
    </div>
  </form>
  @if(session('loginError'))
    <div>
      <h2>{{ session('loginError') }}</h2>
    </div>
  @endif
@endsection