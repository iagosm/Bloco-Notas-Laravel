@extends('layout.principal')

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow-sm rounded border-danger">
        <div class="card-header bg-danger text-white">
          <h4 class="mb-0">🛑 Confirmar Exclusão</h4>
        </div>

        <div class="card-body">
          <p class="mb-3">
            Tem certeza que deseja <strong>excluir</strong> a nota abaixo?
            Esta ação <strong>não poderá ser desfeita</strong>.
          </p>

          <div class="mb-3 p-3 bg-light rounded">
            <h5 class="mb-1">{{ $note['title'] }}</h5>
            <p class="text-muted mb-0">{{ $note['text'] }}</p>
            <p class="text-muted small mt-2">
              Criada em: <strong>{{ date('d/m/Y H:i', strtotime($note['created_at'])) }}</strong>
            </p>
          </div>

          <form action="{{ route('deleteNoteSubmit') }}" method="POST">
            @csrf
            <input type="hidden" name="note_id" value="{{ Crypt::encrypt($note['id']) }}">
            <div class="d-flex justify-content-end">
              <a href="{{ route('home') }}" class="btn btn-outline-secondary mr-2">
                Cancelar
              </a>
              <button type="submit" class="btn btn-danger">
                🗑️ Excluir Nota
              </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection