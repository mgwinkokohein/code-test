@can('admin.access.movie.create')
<div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
    <a href="{{ route('admin.movie.create') }}" class="btn btn-success ml-1" data-toggle="tooltip" title="{{ __('movie::menus.backend.movie.create') }}"><i class="fas fa-plus-circle"></i></a>
</div>
<!--btn-toolbar-->
@endcan