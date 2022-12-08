@extends('layouts.app')

@section('content')
    {!! Breadcrumbs::render() !!}
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Users</p>
                                <h5 class="font-weight-bolder">
                                    {{ $data['usersCount'] }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Categories</p>
                                <h5 class="font-weight-bolder">
                                    {{ $data['categoriesCount'] }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Templates</p>
                                <h5 class="font-weight-bolder">
                                    {{ $data['templatesCount'] }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Question</p>
                                <h5 class="font-weight-bolder">
                                    {{ $data['questionsCount'] }}
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">Users overview</h6>
                    <p class="text-sm mb-0">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-bold">4% more</span> in 2021
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-0">Categories</h6>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        @foreach ($categories as $category)
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        @if ($category->image != null)
                                            <img src="{{ asset('/storage/image/' . $category->image->image) }}"
                                                class="avatar avatar-sm me-3" alt="category1">
                                        @elseif ($category->image == null)
                                            <img src="../assets/img/user.png" class="avatar avatar-sm me-3" alt="category1">
                                        @endif
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">{{ $category->name }}</h6>
                                        @foreach ($category->quiz_templates as $quiztemplate)
                                            <span class="text-xs">{{ $quiztemplate->name }}
                                                {{-- <span class="font-weight-bold"> {{ count($category->quiz_questions)  }}</span> --}}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 mt-3">
        <div class="card">
            <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Users</h6>
            </div>
            <div class="card-body p-3">
                <ul class="list-group">
                    @foreach ($quizpoints as $key => $quizpoint)
                        @php
                            $counts[]     = $quizpoint->count;
                            $sliced_array = array_slice($counts, 0, 5);
                            $quizcounts[] = $quizpoint->count;
                            $userlist     = \App\Models\User::find($quizpoint->user_id);
                        @endphp
                        @if ($sliced_array === $quizcounts)
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                        @if ($userlist->image != null)
                                            <img src="{{ asset('/storage/image/' . $userlist->image->image) }}"
                                                class="avatar avatar-sm me-3" alt="category1">
                                        @elseif ($userlist->image == null)
                                            <img src="../assets/img/user.png" class="avatar avatar-sm me-3" alt="category1">
                                        @endif
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">{{ $userlist->name }}</h6>
                                        <h6 class="mb-1 text-dark text-sm">{{ $userlist->email }}</h6>
                                        <span class="text-xs">Point
                                            <span class="font-weight-bold">{{ $quizpoint->count }}</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button
                                        class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                            class="ni ni-bold-right" aria-hidden="true"></i></button>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
