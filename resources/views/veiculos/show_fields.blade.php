<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $veiculo->id !!}</p>
</div>

<!-- Modelo Field -->
<div class="form-group">
    {!! Form::label('modelo', 'Modelo:') !!}
    <p>{!! $veiculo->modelo !!}</p>
</div>

<!-- Placa Field -->
<div class="form-group">
    {!! Form::label('placa', 'Placa:') !!}
    <p>{!! $veiculo->placa !!}</p>
</div>

<!-- Chassi Field -->
<div class="form-group">
    {!! Form::label('chassi', 'Chassi:') !!}
    <p>{!! $veiculo->chassi !!}</p>
</div>

<!-- Cor Field -->
<div class="form-group">
    {!! Form::label('cor', 'Cor:') !!}
    <p>{!! $veiculo->cor !!}</p>
</div>

<!-- Ano Field -->
<div class="form-group">
    {!! Form::label('ano', 'Ano:') !!}
    <p>{!! $veiculo->ano !!}</p>
</div>

<!-- Observacao Field -->
<div class="form-group">
    {!! Form::label('disponivel', 'Disponível:') !!}
    <p>{!! ($veiculo->disponivel == 1) ? "Sim" : "Não" !!}</p>
</div>

<!-- Observacao Field -->
<div class="form-group">
    {!! Form::label('observacao', 'Observação:') !!}
    <p>{!! $veiculo->observacao !!}</p>
</div>

