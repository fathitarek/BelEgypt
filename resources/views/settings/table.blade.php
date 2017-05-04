<table class="table table-responsive" id="settings-table">
    <thead>
        <th>Title En</th>
        <th>Title Ar</th>
        <th>Email</th>
        <th>Hotline</th>
        <th>Brand Id</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($settings as $settings)
        <tr>
            <td>{!! $settings->title_en !!}</td>
            <td>{!! $settings->title_ar !!}</td>
            <td>{!! $settings->email !!}</td>
            <td>{!! $settings->hotline !!}</td>
            <td>{!! $settings->brand->name_en !!}</td>
            <td>{!! $settings->created_at !!}</td>
            <td>{!! $settings->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['settings.destroy', $settings->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('settings.show', [$settings->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('settings.edit', [$settings->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
