<?php

use App\Models\Category;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.dashboard.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Admin/Dashboard', route('admin.dashboard.index'));
});
 
Breadcrumbs::for('admin.users.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Admin/Users', route('admin.users.index'));
});


Breadcrumbs::for('admin.categories.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Admin/Categories', route('admin.categories.index'));
});
Breadcrumbs::for('admin.categories.create', function (BreadcrumbTrail $trail): void {
    $trail->push('Admin/Categories/Create', route('admin.categories.create'));
});


Breadcrumbs::for('admin.topics.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Admin/Topics', route('admin.topics.index'));
});
Breadcrumbs::for('admin.topics.create', function (BreadcrumbTrail $trail): void {
    $trail->push('Admin/Topics/Create', route('admin.topics.create'));
});


Breadcrumbs::for('admin.quiztemplates.index', function (BreadcrumbTrail $trail): void {
    $trail->push('Admin/QuizTemplates', route('admin.quiztemplates.index'));
});
Breadcrumbs::for('admin.quiztemplates.create', function (BreadcrumbTrail $trail): void {
    $trail->push('Admin/QuizTemplates/Create', route('admin.quiztemplates.create'));
});
