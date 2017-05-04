<table class="table table-responsive" id="inquiries-table">
    <thead>
        <th>Name</th>
        <th>Mobile</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Brand</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($inquiries as $inquiry)
        <tr>
            <td>{!! $inquiry->name !!}</td>
            <td>{!! $inquiry->mobile !!}</td>
            <td>{!! $inquiry->subject !!}</td>
            <td>{!! $inquiry->message !!}</td>
            <td>{!! $inquiry->brand->name_en!!} </td>
            <td>{!! $inquiry->created_at !!}</td>
            <td>{!! $inquiry->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['inquiries.destroy', $inquiry->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('inquiries.show', [$inquiry->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('inquiries.edit', [$inquiry->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
