<!-- Title En Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title_en', 'Title En:') !!}
    {!! Form::text('title_en', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Ar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title_ar', 'Title Ar:') !!}
    {!! Form::text('title_ar', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Hotline Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hotline', 'Hotline:') !!}
    {!! Form::text('hotline', null, ['class' => 'form-control']) !!}
</div>

<!-- Brand  Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand_id', 'Brand:') !!}
    {!! Form::select('brand_id', [null=>'Please Select Brand']+$brands,null, ['class' => 'form-control']) !!}
</div>
<!-- Google analytics-->
<div class="form-group col-sm-6">
  {!! Form::label('google_analytics', 'Google Analytics:') !!}
{{ Form::textarea('google_analytics') }}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('settings.index') !!}" class="btn btn-default">Cancel</a>
</div>
