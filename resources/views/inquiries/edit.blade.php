@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Inquiry
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($inquiry, ['route' => ['inquiries.update', $inquiry->id], 'method' => 'patch']) !!}

                        @include('inquiries.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection