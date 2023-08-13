@extends ('backend.layouts.app')

@section ('title', __('api::labels.backend.api.management'))

@section('breadcrumb-links')
    @include('api::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('api::labels.backend.api.management') }}
                    <small class="text-muted">{{ __('api::labels.backend.api.show') }}</small>
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
                    <strong>{{ __('api::labels.backend.api.table.created') }}:</strong> {{ $api->updated_at->timezone(get_user_timezone()) }} ({{ $api->created_at->diffForHumans() }}),
                    <strong>{{ __('api::labels.backend.api.table.last_updated') }}:</strong> {{ $api->created_at->timezone(get_user_timezone()) }} ({{ $api->updated_at->diffForHumans() }})
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