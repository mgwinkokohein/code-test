<?php

Breadcrumbs::for('admin.moviereview.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('moviereview::labels.backend.moviereview.management'), route('admin.moviereview.index'));
});

Breadcrumbs::for('admin.moviereview.create', function ($trail) {
    $trail->parent('admin.moviereview.index');
    $trail->push(__('moviereview::labels.backend.moviereview.create'), route('admin.moviereview.create'));
});

Breadcrumbs::for('admin.moviereview.show', function ($trail, $id) {
    $trail->parent('admin.moviereview.index');
    $trail->push(__('moviereview::labels.backend.moviereview.show'), route('admin.moviereview.show', $id));
});

Breadcrumbs::for('admin.moviereview.edit', function ($trail, $id) {
    $trail->parent('admin.moviereview.index');
    $trail->push(__('moviereview::labels.backend.moviereview.edit'), route('admin.moviereview.edit', $id));
});
