<ul class="nav nav-pills nav-stacked navbar-custom-nav">
    <li @if($active == 'theme') class="active" @endif>
        <a href="{{ route('settings.index') }}"><i class="fa fa-fw fa-code"></i>Theme Settings</a>
    </li>
    <li @if($active == 'company') class="active" @endif >
        <a href="{{ route('company.index') }}">
        <i class="fa fa-fw fa-info-circle"></i>Company Details</a>
    </li>
    <li @if($active == 'social') class="active" @endif>
        <a href="{{ route('social.index') }}"><i class="fa fa-fw fa-comments"></i>Social Settings</a>
    </li>
</ul>