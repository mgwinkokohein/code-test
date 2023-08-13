@extends ('backend.layouts.app')

@section ('title', appName() . ' | ' . __('moviereview::labels.backend.moviereview.management'))

@section('breadcrumb-links')
    @include('moviereview::includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{ style("https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css") }}
    {{ style('assets/plugins/sweetalert2/sweetalert2.min.css') }}
@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('moviereview::labels.backend.moviereview.management') }} <small class="text-muted">{{ __('moviereview::labels.backend.moviereview.list') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('moviereview::includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table id="moviereview-table" class="table table-condensed table-hover">
                        <thead>
                        <tr>
                            <th>{{ __('moviereview::labels.backend.moviereview.table.id') }}</th>
                            <th>{{ __('moviereview::labels.backend.moviereview.table.movie') }}</th>
                            <th>{{ __('moviereview::labels.backend.moviereview.table.email') }}</th>
                            <th>{{ __('moviereview::labels.backend.moviereview.table.review_text') }}</th>
                            <th>{{ __('moviereview::labels.backend.moviereview.table.last_updated') }}</th>
                            <th>{{ __('labels.general.actions') }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection

@push('after-scripts')
    {{ script("js/backend/plugin/datatables/dataTables.min.js") }}
    {{ script("js/backend/plugin/datatables/dataTables.bootstrap4.min.js") }}
    <!-- {{ script("js/backend/plugin/datatables/dataTables-extend.js") }} -->
    {{ script('assets/plugins/sweetalert2/sweetalert2.all.min.js')}}

    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#moviereview-table').DataTable({
                serverSide: true,
                ajax: {
                    url: '{!! route("admin.moviereview.get") !!}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                        else swal(xhr.responseJSON.message);
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'movie', name: 'movie.name'},
                    {data: 'user_email', name: 'email'},
                    {data: 'review_text', name: 'review_text'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                fnDrawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    load_plugins();
                }
            });
        });
    </script>
@endpush