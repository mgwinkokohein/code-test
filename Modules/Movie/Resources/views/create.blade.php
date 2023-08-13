@extends ('backend.layouts.app')

@section ('title', __('movie::labels.backend.movie.management') . ' | ' . __('movie::labels.backend.movie.create'))

@section('breadcrumb-links')
    @include('movie::includes.breadcrumb-links')
@endsection

@push('after-styles')

@endpush

@section('content')
{{ html()->form('POST', route('admin.movie.store'))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('movie::labels.backend.movie.management') }}
                        <small class="text-muted">{{ __('movie::labels.backend.movie.create') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->

            <hr />

            <div class="row mt-4 mb-4">
                <div class="col">

                    <div class="form-group row">
                    {{ html()->label(__('movie::labels.backend.movie.table.title'))->class('col-md-2 form-control-label')->for('title') }}

                        <div class="col-md-10">
                            {{ html()->text('title')
                                ->class('form-control')
                                ->placeholder(__('movie::labels.backend.movie.table.title'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                    {{ html()->label(__('movie::labels.backend.movie.table.director'))->class('col-md-2 form-control-label')->for('director') }}

                        <div class="col-md-10">
                            {{ html()->text('director')
                                ->class('form-control')
                                ->placeholder(__('movie::labels.backend.movie.table.director'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->
                    
                    <div class="form-group row">
                    {{ html()->label(__('movie::labels.backend.movie.table.rating'))->class('col-md-2 form-control-label')->for('rating') }}

                        <div class="col-md-10">
                            {{ html()->text('rating')
                                ->class('form-control')
                                ->placeholder(__('movie::labels.backend.movie.table.rating'))
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.movie.index'), __('buttons.general.cancel')) }}
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