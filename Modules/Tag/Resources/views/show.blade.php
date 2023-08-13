@extends ('backend.layouts.app')

@section ('title', __('tag::labels.backend.tag.management'))

@section('breadcrumb-links')
    @include('tag::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('tag::labels.backend.tag.management') }}
                    <small class="text-muted">{{ __('tag::labels.backend.tag.show') }}</small>
                </h4>
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4 mb-4">
            <div class="col">
                <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                    <tr>
                       <th style="width: 20%;">{{ __('tag::labels.backend.tag.table.name') }}</th>
                       <td>{{ $tag->name }}</td>
                    </tr>
                    
                </table>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    <strong>{{ __('tag::labels.backend.tag.table.created') }}:</strong> {{ $tag->updated_at->timezone(get_user_timezone()) }} ({{ $tag->created_at->diffForHumans() }}),
                    <strong>{{ __('tag::labels.backend.tag.table.last_updated') }}:</strong> {{ $tag->created_at->timezone(get_user_timezone()) }} ({{ $tag->updated_at->diffForHumans() }})
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