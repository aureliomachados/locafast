<!-- Modal -->
<div class="modal fade" id="modalAprovar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('locacoes.aprovar', ['solicitacao' => $solicitacao]) }}" method="post">
                {!! csrf_field() !!}


                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Aprovar solicitação</h4>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="observacoes">Observações</label>
                        <textarea class="form-control" name="observacoes"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Aprovar solicitação</button>
                </div>

            </form>
        </div>
    </div>
</div>