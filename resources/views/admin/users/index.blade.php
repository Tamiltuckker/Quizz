@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        @include('flash-message')
                        @yield('content')
                        {{$dataTable->table()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('script')  
@endsection

@push('js')
    {{$dataTable->scripts()}}
@endpush
