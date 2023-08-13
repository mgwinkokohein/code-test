@extends ('backend.layouts.app')

@section ('title', __('moviereview::labels.backend.moviereview.management'))

@section('breadcrumb-links')
    @include('moviereview::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('moviereview::labels.backend.moviereview.management') }}
                    <small class="text-muted">{{ __('moviereview::labels.backend.moviereview.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('moviereview::labels.backend.moviereview.table.created') }}:</strong> {{ $moviereview->updated_at->timezone(get_user_timezone()) }} ({{ $moviereview->created_at->diffForHumans() }}),
                    <strong>{{ __('moviereview::labels.backend.moviereview.table.last_updated') }}:</strong> {{ $moviereview->created_at->timezone(get_user_timezone()) }} ({{ $moviereview->updated_at->diffForHumans() }})
                </small>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-footer-->
</div><!--card-->
@endsection

@push('after-scripts')

<script>


</script>
@endpush