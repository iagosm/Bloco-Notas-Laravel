@extends('layout.principal')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm rounded">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">✏️ Criar Nova Nota</h4>
                </div>

                <div class="card-body">
                    <form id="newNoteSubmit" action="{{ route('newNoteSubmit') }}" method="POST">
                        @csrf

                        <!-- Título -->
                        <div class="form-group mb-3">
                            <label for="title" class="font-weight-bold">Título</label>
                            <input type="text" 
                                   name="title" 
                                   id="title" 
                                   class="form-control @error('title') is-invalid @enderror" 
                                   value="{{ old('title') }}" 
                                   placeholder="Digite o título da sua nota"
                                   >
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Texto da Nota -->
                        <div class="form-group mb-3">
                            <label for="note" class="font-weight-bold">Conteúdo da Nota</label>
                            <textarea name="note" 
                                id="note" 
                                rows="6" 
                                class="form-control @error('note') is-invalid @enderror" 
                                placeholder="Escreva sua nota aqui..."
                                >{{ old('note') }}</textarea>
                            @error('note')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botões -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary mr-2">
                                Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                💾 Salvar
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
