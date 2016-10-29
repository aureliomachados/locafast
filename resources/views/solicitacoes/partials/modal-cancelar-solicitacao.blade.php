<!-- Modal -->
<div class="modal fade" id="modalReprovar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('solicitacoes.update', ['id' => $solicitacao->id])}}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="PUT"/>
                <input type="hidden" name="status" value="2">


            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cancelar solicitação</h4>
            </div>
            <div class="modal-body">

                    <div class="form-group">
                        <label for="observacoes">Descrição</label>
                        <textarea class="form-control" name="observacoes"></textarea>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Confirmar cancelamento</button>
            </div>

            </form>
        </div>
    </div>
</div>