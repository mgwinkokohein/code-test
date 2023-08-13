<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('api::menus.backend.api.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.api.index') }}">{{ __('api::menus.backend.api.all') }}</a>
                @can('admin.access.api.create')
                <a class="dropdown-item" href="{{ route('admin.api.create') }}">{{ __('api::menus.backend.api.create') }}</a>
                @endcan
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>