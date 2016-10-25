<!-- Modelo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('modelo', 'Modelo:') !!}
    {!! Form::text('modelo', null, ['class' => 'form-control']) !!}
</div>

<!-- Placa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('placa', 'Placa:') !!}
    {!! Form::text('placa', null, ['class' => 'form-control']) !!}
</div>

<!-- Chassi Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chassi', 'Chassi:') !!}
    {!! Form::text('chassi', null, ['class' => 'form-control']) !!}
</div>

<!-- Cor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cor', 'Cor:') !!}
    {!! Form::text('cor', null, ['class' => 'form-control']) !!}
</div>

<!-- Ano Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ano', 'Ano:') !!}
    {!! Form::text('ano', null, ['class' => 'form-control']) !!}
</div>

<!-- Observacao Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observacao', 'Observacao:') !!}
    {!! Form::textarea('observacao', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('veiculos.index') !!}" class="btn btn-default">Cancel</a>
</div>
