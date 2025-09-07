<div class="note-card">
  <div class="d-flex justify-content-between">
    <h4 class="note-title">{{ $note['title'] }}</h4>
    <div class="note-actions d-flex gap-2">
      <a href="{{ route('edit',Crypt::encrypt($note['id'])) }}" class="btn btn-secondary btn-sm">
        <i class="fa fa-pen"></i>
      </a>
      <a href="{{ route('delete',Crypt::encrypt($note['id'])) }}" 
        class="btn btn-danger btn-sm"
        onclick="return confirm('Tem certeza que deseja excluir esta nota?')">
        <i class="fa fa-trash"></i>
      </a>
    </div>
  </div>
  <p class="note-meta">Criado em: <strong>{{ date('d-m-Y H:i:s', strtotime($note['created_at'])) }}</strong></p>
  <hr>
  <p>{{ $note['text'] }}</p>
</div>