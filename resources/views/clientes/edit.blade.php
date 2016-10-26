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