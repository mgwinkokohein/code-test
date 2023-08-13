<?php

Breadcrumbs::for('admin.tag.index', function ($trail) {
	$trail->push(__('Home'), route('admin.dashboard'));
    $trail->push(__('tag::labels.backend.tag.management'), route('admin.tag.index'));
});

Breadcrumbs::for('admin.tag.create', function ($trail) {
    $trail->parent('admin.tag.index');
    $trail->push(__('tag::labels.backend.tag.create'), route('admin.tag.create'));
});

Breadcrumbs::for('admin.tag.show', function ($trail, $id) {
    $trail->parent('admin.tag.index');
    $trail->push(__('tag::labels.backend.tag.show'), route('admin.tag.show', $id));
});

Breadcrumbs::for('admin.tag.edit', function ($trail, $id) {
    $trail->parent('admin.tag.index');
    $trail->push(__('tag::labels.backend.tag.edit'), route('admin.tag.edit', $id));
});
