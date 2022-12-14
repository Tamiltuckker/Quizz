@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                <div class="float-left">
                    <a class="btn bg-gradient-info font-weight-bold text-xs"href="{{ route('admin.categories.create') }}">Create</a>
                </div>
                    <h6>Categories table</h6>
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
@endsection
{{-- @include('script')  --}}
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function(){
          // over all delete concept
          $('body').on('click', '.btn-delete', function() {
            $this = $(this);
           console.log($this.data('delete-route'));
            swal({
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel", "Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: 'DELETE',
                        url: $this.data('delete-route'),
                        success: function () {
                            swal({
                                title: "Deleted!",
                                text: "Your record has been deleted.",
                                type: "success",
                            }).
                            then(function() {
                                window.location.reload();
                            });
                        },
                        error: function (jqXhr) {
                            swalError(jqXhr);
                        }
                    });
                }
            });
        });
    }); 
</script>
{{$dataTable->scripts()}}
@endpush