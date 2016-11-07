@extends('layouts.app')

@section('content')
    <form action="" method="post">
        <select name="estado" id="estado">

        </select>
        <br>

        <select name="cidade" id="cidade">

        </select>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){

            var baseApiUrl = 'http://localhost:8000/api/'

            //lógica para carregar seleção de estados
            var estados = [];
            var selecao = $('#estado');
            $.getJSON(baseApiUrl + 'estados', function (data) {
                estados = data.estados;
                $.each(estados, function(i, estado){
                    selecao.append("<option value='" + estado.id + "'>" + estado.nome + "</option>");
                });
            });

            //logica para carregar seleção de cidades
            $.getJSON(baseApiUrl + 'cidades/estado/1', function(data){
                $.each(data.cidades, function(i, cidade){
                    $('#cidade').append("<option value='" + cidade.id + "'>" + cidade.nome + "</option>");
                });
            });

            //logica quando muda o estado para carregar a lista de cidades.
            $('#estado').change(function(){
                var cidades = [];

                var selecao = $('#cidade');

                //remove todas as opções quando um novo estado for selecionado
                selecao.empty();

                $.getJSON(baseApiUrl + 'cidades/estado/' + $('#estado').val() , function(data){
                    cidades = data.cidades;
                    $.each(cidades, function (i, cidade) {
                        selecao.append("<option value='" + cidade.id + "'>" + cidade.nome + "</option>");
                    });
                });
            });
        });
    </script>
@endsection