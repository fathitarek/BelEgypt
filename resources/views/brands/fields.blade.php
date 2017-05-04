<!-- Name En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_en', 'Name En:') !!}
    {!! Form::text('name_en', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Ar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name_ar', 'Name Ar:') !!}
    {!! Form::text('name_ar', null, ['class' => 'form-control']) !!}
</div>
<!-- KeyWord EN Field -->

<div class="form-group col-sm-6">
  {!! Form::label('keyword_en', 'KeyWord En:') !!}

  {!!Form::text('keyword_en',null,['class'=> 'form-control','data-role'=>'tagsinput']) !!}
</div>

<!-- KeyWord AR Field -->

<div class="form-group col-sm-6">
{!! Form::label('keyword_ar', 'KeyWord Ar:') !!}
{!!Form::text('keyword_ar',null,['class'=> 'form-control','data-role'=>'tagsinput']) !!}
</div>

<!-- description EN Field -->
<div class="form-group">
    {!!Form::label('description_en','Description En:')!!}
    {!!Form::text('description_en',null,['class'=> 'form-control','data-role'=>'tagsinput']) !!}
</div>


<!-- description AR Field -->
<div class="form-group col-sm-6">
{!! Form::label('description_ar', 'Description Ar:') !!}
{!!Form::text('description_ar',null,['class'=> 'form-control','data-role'=>'tagsinput']) !!}
</div>

<!-- Google analytics-->
<div class="form-group col-sm-6">
  {!! Form::label('google_analytics', 'Google Analytics:') !!}
{{ Form::textarea('google_analytics') }}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('brands.index') !!}" class="btn btn-default">Cancel</a>
</div>
