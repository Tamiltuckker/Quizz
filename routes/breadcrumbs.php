<?php

use App\Models\Category;
use App\Models\QuizTemplate;
use App\Models\User;
use App\Models\Content;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.dashboard.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Home / Dashboard', route('admin.dashboard.index'));
});

Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Home / Users', route('admin.users.index'));
});

Breadcrumbs::for('admin.users.edit', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('admin.users.index');
    $trail->push(' Edit', route('admin.users.edit',$user));
});

Breadcrumbs::for('admin.categories.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Home / Categories', route('admin.categories.index'));
});

Breadcrumbs::for('admin.categories.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.categories.index');
    $trail->push('Create', route('admin.categories.create'));
});

Breadcrumbs::for('admin.categories.edit', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('admin.categories.index');
    $trail->push('Edit', route('admin.categories.edit',$category));
});

Breadcrumbs::for('admin.quiztemplates.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Home / QuizTemplates', route('admin.quiztemplates.index'));
});

Breadcrumbs::for('admin.quiztemplates.create', function (BreadcrumbTrail $trail): void {
    $trail->parent('admin.quiztemplates.index');
    $trail->push('Create', route('admin.quiztemplates.create'));
});

Breadcrumbs::for('admin.contents.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Home / Contents', route('admin.contents.index'));
});

Breadcrumbs::for('admin.contents.edit', function (BreadcrumbTrail $trail, Content $content) {
    $trail->parent('admin.contents.index');
    $trail->push('Edit', route('admin.contents.edit',$content));
});

