<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}
</div>

<!-- Telefone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefone', 'Telefone:') !!}
    {!! Form::number('telefone', null, ['class' => 'form-control']) !!}
</div>

<!-- Cpf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cpf', 'Cpf:') !!}
    {!! Form::number('cpf', null, ['class' => 'form-control']) !!}
</div>

<!-- Rg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rg', 'Rg:') !!}
    {!! Form::number('rg', null, ['class' => 'form-control']) !!}
</div>

<!-- Cnh Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnh', 'Cnh:') !!}
    {!! Form::number('cnh', null, ['class' => 'form-control']) !!}
</div>

<!-- Endereco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endereco', 'Endereço:') !!}
    {!! Form::text('endereco', null, ['class' => 'form-control']) !!}
</div>

<!-- Cep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cep', 'Cep:') !!}
    {!! Form::text('cep', null, ['class' => 'form-control']) !!}
</div>

<!-- Cidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cidade', 'Cidade:') !!}
    {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacoes Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacoes', 'Observações:') !!}
    {!! Form::textarea('observacoes', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Cancelar</a>
</div>
