@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Veiculo
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($veiculo, ['route' => ['veiculos.update', $veiculo->id], 'method' => 'patch']) !!}

                        @include('veiculos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection