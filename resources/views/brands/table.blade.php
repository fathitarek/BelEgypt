<table class="table table-responsive" id="brands-table">
    <thead>
        <th>Name En</th>
        <th>Name Ar</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($brands as $brand)
        <tr>
            <td>{!! $brand->name_en !!}</td>
            <td>{!! $brand->name_ar !!}</td>
            <td>{!! $brand->created_at !!}</td>
            <td>{!! $brand->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['brands.destroy', $brand->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('brands.show', [$brand->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('brands.edit', [$brand->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>