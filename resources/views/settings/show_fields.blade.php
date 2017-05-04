<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $settings->id !!}</p>
</div>

<!-- Title En Field -->
<div class="form-group">
    {!! Form::label('title_en', 'Title En:') !!}
    <p>{!! $settings->title_en !!}</p>
</div>

<!-- Title Ar Field -->
<div class="form-group">
    {!! Form::label('title_ar', 'Title Ar:') !!}
    <p>{!! $settings->title_ar !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $settings->email !!}</p>
</div>

<!-- Hotline Field -->
<div class="form-group">
    {!! Form::label('hotline', 'Hotline:') !!}
    <p>{!! $settings->hotline !!}</p>
</div>

<!-- Brand Id Field -->
<div class="form-group">
    {!! Form::label('brand_id', 'Brand:') !!}
    <p>{!! $settings->brand->name_en !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $settings->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $settings->updated_at !!}</p>
</div>
