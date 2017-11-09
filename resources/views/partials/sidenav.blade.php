@section('sidenav')
    <div class="collection">
        <a href="{{ route('company.edit') }}" class="collection-item {{ Ekko::isActiveRoute('company.edit') }}">Company</a>
        <a href="{{ route('company.settings.edit') }}" class="collection-item {{ Ekko::isActiveRoute('company.settings.edit') }}">Settings</a>
        <a href="{{ route('company.address.edit') }}" class="collection-item {{ Ekko::isActiveRoute('company.address.edit') }}">Address</a>
        <a href="{{ route('user.edit') }}" class="collection-item {{ Ekko::isActiveRoute('user.edit') }}">Profile</a>
        <a href="{{ route('migration.create') }}" class="collection-item {{ Ekko::isActiveRoute('migration.create') }}">Data Migration</a>
    </div>
@show