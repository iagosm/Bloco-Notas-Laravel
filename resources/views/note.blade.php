<div class="note-card shadow-sm p-3 rounded bg-white h-100 d-flex flex-column">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="note-title mb-0 text-truncate" title="{{ $note['title'] }}">{{ $note['title'] }}</h4>
        <div class="note-actions d-flex gap-2">
            <a href="{{ route('edit', Crypt::encrypt($note['id'])) }}" class="btn btn-outline-secondary btn-sm">
                <i class="fa fa-pen"></i>
            </a>
            <a href="{{ route('delete', Crypt::encrypt($note['id'])) }}" 
               class="btn btn-outline-danger btn-sm"
               onclick="return confirm('Tem certeza que deseja excluir esta nota?')">
                <i class="fa fa-trash"></i>
            </a>
        </div>
    </div>

    <p class="note-meta text-muted small mb-2">
        Criado em: <strong>{{ date('d/m/Y H:i', strtotime($note['created_at'])) }}</strong>
    </p>
    @if($note['created_at'] !== $note['updated_at'])
       <p class="note-meta text-muted small mb-2">
        Atualizado em: <strong>{{ date('d/m/Y H:i', strtotime($note['updated_at'])) }}</strong>
        </p>
    @endif
    <hr class="my-2">

    <p class="note-text text-muted flex-grow-1">{{ $note['text'] }}</p>
</div>
