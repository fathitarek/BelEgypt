@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Inquiries</h1>
        <h1 class="pull-right">



 @if(isset($_REQUEST['brand_id']))
    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/export/<?php echo $_REQUEST['brand_id'] ;?>">Export</a>
 @else
    <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="/export/0">Export</a>
 @endif
        </h1>
        <form method="get" action='/inquiries' name='filter_form' id='filter_form'>
        <select id="brand_id" name="brand_id">
          <option disabled selected value > Filter By Brand</option>
           <?php foreach ($brands as  $brand) {?>

              <option value='<?php echo $brand->id; ?>'> <?php echo $brand->name_en; ?></option>

            <?php } ?>
        </select>
</form>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('inquiries.table')
            </div>
        </div>
    </div>
@endsection
