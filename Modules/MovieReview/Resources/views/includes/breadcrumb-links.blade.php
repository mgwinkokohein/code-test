<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('moviereview::menus.backend.moviereview.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.moviereview.index') }}">{{ __('moviereview::menus.backend.moviereview.all') }}</a>
                @can('admin.access.moviereview.create')
                <a class="dropdown-item" href="{{ route('admin.moviereview.create') }}">{{ __('moviereview::menus.backend.moviereview.create') }}</a>
                @endcan
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>