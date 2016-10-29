<div class="panel panel-default">

    <div class="panel-heading panel-title text-center">
        Informações do cliente
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Nome</th>
                    <td>{{ $cliente->nome }}</td>
                </tr>
                <tr>
                    <th>Telefone</th>
                    <td>{{ $cliente->telefone }}</td>
                </tr>
                <tr>
                    <th>CPF</th>
                    <td>{{ $cliente->cpf }}</td>
                </tr>
                <tr>
                    <th>RG</th>
                    <td>{{ $cliente->rg }}</td>
                </tr>
                <tr>
                    <th>CNH</th>
                    <td>{{ $cliente->cnh }}</td>
                </tr>
                <tr>
                    <th>Endereço</th>
                    <td>{{ $cliente->endereco }}</td>
                </tr>
                <tr>
                    <th>CEP</th>
                    <td>{{ $cliente->cep }}</td>
                </tr>
                <tr>
                    <th>Cidade</th>
                    <td>{{ $cliente->cidade }}</td>
                </tr>
            </table>
            <br/>

            <label for="observacoes">Observações: </label>
            <div class="well" id="observacoes">{{ $cliente->observacoes }}</div>
        </div>
    </div>
</div>