<li class="breadcrumb-menu">
    <div class="btn-group" role="group" aria-label="Button group">
        <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" role="button" id="breadcrumb-dropdown-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('tag::menus.backend.tag.main') }}</a>

            <div class="dropdown-menu" aria-labelledby="breadcrumb-dropdown-1">
                <a class="dropdown-item" href="{{ route('admin.tag.index') }}">{{ __('tag::menus.backend.tag.all') }}</a>
                @can('admin.access.tag.create')
                <a class="dropdown-item" href="{{ route('admin.tag.create') }}">{{ __('tag::menus.backend.tag.create') }}</a>
                @endcan
            </div>
        </div><!--dropdown-->

        <!--<a class="btn" href="#">Static Link</a>-->
    </div><!--btn-group-->
</li>