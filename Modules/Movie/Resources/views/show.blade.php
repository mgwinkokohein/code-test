@extends ('backend.layouts.app')

@section ('title', __('movie::labels.backend.movie.management'))

@section('breadcrumb-links')
    @include('movie::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('movie::labels.backend.movie.management') }}
                    <small class="text-muted">{{ __('movie::labels.backend.movie.show') }}</small>
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
                    <strong>{{ __('movie::labels.backend.movie.table.created') }}:</strong> {{ $movie->updated_at->timezone(get_user_timezone()) }} ({{ $movie->created_at->diffForHumans() }}),
                    <strong>{{ __('movie::labels.backend.movie.table.last_updated') }}:</strong> {{ $movie->created_at->timezone(get_user_timezone()) }} ({{ $movie->updated_at->diffForHumans() }})
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