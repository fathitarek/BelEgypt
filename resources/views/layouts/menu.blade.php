<li class="{{ Request::is('brands*') ? 'active' : '' }}">
    <a href="{!! route('brands.index') !!}"><i class="fa fa-edit"></i><span>brands</span></a>
</li>

<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{!! route('settings.index') !!}"><i class="fa fa-edit"></i><span>settings</span></a>
</li>

<li class="{{ Request::is('inquiries*') ? 'active' : '' }}">
    <a href="{!! route('inquiries.index') !!}"><i class="fa fa-edit"></i><span>inquiries</span></a>
</li>
