<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('movie::menus.backend.movie.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.movie.index') }}">{{ __('movie::menus.backend.movie.all') }}</a>
                @can('admin.access.movie.create')
                <a class="dropdown-item" href="{{ route('admin.movie.create') }}">{{ __('movie::menus.backend.movie.create') }}</a>
                @endcan
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>