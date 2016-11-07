@extends('layouts.app')

@section('title', 'Editar cliente')

@section('content')
    <section class="content-header">
        <h1>
            Editar cliente
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cliente, ['route' => ['clientes.update', $cliente->id], 'method' => 'patch']) !!}

                        @include('clientes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            var baseApiUrl = 'http://localhost:8000/api/'

            //lógica para carregar seleção de estados
            var estados = [];

            var selecao = $('#estado_id');

            $.getJSON(baseApiUrl + 'estados', function (data) {
                estados = data.estados;
                $.each(estados, function(i, estado){
                    if(estado.id == {{ $cliente->estado_id }}){
                        selecao.append("<option value='" + estado.id + "' selected>" + estado.nome + "</option>");
                    }
                    selecao.append("<option value='" + estado.id + "'>" + estado.nome + "</option>");

                });
            });

            //logica para carregar seleção de cidades
            $.getJSON(baseApiUrl + 'cidades/estado/{{ $cliente->estado_id }}', function(data){
                $.each(data.cidades, function(i, cidade){
                    if(cidade.id == {{ $cliente->cidade_id }}){
                        $('#cidade_id').append("<option value='" + cidade.id + "' selected>" + cidade.nome + "</option>");
                    }
                    $('#cidade_id').append("<option value='" + cidade.id + "'>" + cidade.nome + "</option>");
                });
            });

            //logica quando muda o estado para carregar a lista de cidades.
            $('#estado_id').change(function(){
                var cidades = [];

                var selecao = $('#cidade_id');

                //remove todas as opções quando um novo estado for selecionado
                selecao.empty();

                //valor default
                selecao.append('<option disabled selected value>Selecione uma cidade</option>');

                $.getJSON(baseApiUrl + 'cidades/estado/' + $('#estado_id').val() , function(data){
                    cidades = data.cidades;
                    $.each(cidades, function (i, cidade) {
                        selecao.append("<option value='" + cidade.id + "'>" + cidade.nome + "</option>");
                    });
                });
            });
        });
    </script>
@endsection
