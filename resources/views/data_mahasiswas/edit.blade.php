@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Data Mahasiswa
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dataMahasiswa, ['route' => ['dataMahasiswas.update', $dataMahasiswa->id], 'method' => 'patch']) !!}

                        @include('data_mahasiswas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection