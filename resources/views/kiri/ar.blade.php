@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                  <form method="post" action="/thanks">
                    <!-- scrf token -->
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <input type="hidden" name="lang" value="ar">
                      @include('inquiries.fields')
                        {{ Form::hidden('brand_id', '1') }}

                  {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
