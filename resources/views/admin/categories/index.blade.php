@extends('layouts.app')

@section('content')
    <!-- End Navbar -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    @if ($message = Session::get('success'))
                        @if($message=="Category deleted successfully")                          
                        <p class="alert alert-danger text-white" role="alert">{{ $message }}</p>     
                        @else
                        <p class="alert alert-success text-white" role="alert">{{ $message }}</p>                    
                        @endif  
                    @endif 
                    <div class="float-right">
                        <a class="btn bg-gradient-success" href="{{ route('categories.create') }}">Create</a>
                    </div>
                    <h6>Categories table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Category</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">    
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $category->name }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($category->active ==  \App\Models\Category::ACTIVE)
                                                <span class="badge badge-sm bg-gradient-success">active </span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-danger">inactive</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'POST']) !!}
                                                <div>
                                                    <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger show_confirm">Delete</button>
                                                </div>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@push('js')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
@endpush

@endsection
