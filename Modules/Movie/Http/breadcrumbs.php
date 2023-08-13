<?php

Breadcrumbs::for('admin.movie.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('movie::labels.backend.movie.management'), route('admin.movie.index'));
});

Breadcrumbs::for('admin.movie.create', function ($trail) {
    $trail->parent('admin.movie.index');
    $trail->push(__('movie::labels.backend.movie.create'), route('admin.movie.create'));
});

Breadcrumbs::for('admin.movie.show', function ($trail, $id) {
    $trail->parent('admin.movie.index');
    $trail->push(__('movie::labels.backend.movie.show'), route('admin.movie.show', $id));
});

Breadcrumbs::for('admin.movie.edit', function ($trail, $id) {
    $trail->parent('admin.movie.index');
    $trail->push(__('movie::labels.backend.movie.edit'), route('admin.movie.edit', $id));
});
