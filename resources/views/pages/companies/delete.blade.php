
<form action="{{ route('companies.destroy', $company->id) }}" method="post">
    @csrf
    @method('DELETE')
    <div class="modal-body">
        <p>Pretende excluir os registos da Companhia <strong>{{ $company->name }}</strong>, incluindo os
            dados associados?</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn secondary-color" >
            <i class="fas fa-trash"></i>
            Excluir
        </button>
    </div>
</form>