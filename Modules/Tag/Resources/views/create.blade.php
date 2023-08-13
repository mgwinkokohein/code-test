@extends ('backend.layouts.app')

@section ('title', __('tag::labels.backend.tag.management') . ' | ' . __('tag::labels.backend.tag.create'))

@section('breadcrumb-links')
    @include('tag::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
{{ html()->form('POST', route('admin.tag.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('tag::labels.backend.tag.management') }}
                        <small class="text-muted">{{ __('tag::labels.backend.tag.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('tag::labels.backend.tag.table.name'))->class('col-md-2 form-control-label')->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('tag::labels.backend.tag.table.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.tag.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
@endsection

@push('after-scripts')

<script>


</script>
@endpush