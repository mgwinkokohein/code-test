<?php

Breadcrumbs::for('admin.api.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('api::labels.backend.api.management'), route('admin.api.index'));
});

Breadcrumbs::for('admin.api.create', function ($trail) {
    $trail->parent('admin.api.index');
    $trail->push(__('api::labels.backend.api.create'), route('admin.api.create'));
});

Breadcrumbs::for('admin.api.show', function ($trail, $id) {
    $trail->parent('admin.api.index');
    $trail->push(__('api::labels.backend.api.show'), route('admin.api.show', $id));
});

Breadcrumbs::for('admin.api.edit', function ($trail, $id) {
    $trail->parent('admin.api.index');
    $trail->push(__('api::labels.backend.api.edit'), route('admin.api.edit', $id));
});
