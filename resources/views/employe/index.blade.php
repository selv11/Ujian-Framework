@extends('layouts.main')
@section('content')

@if (session('store'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Saved Succesfully!</strong> Employe has been succesfully saved.
    <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
</div>
@endif

@if (session('update'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Update Succesfully!</strong> Employe has been succesfully update.
    <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
</div>
@endif

@if (session('destroy'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Delete Succesfully!</strong> Employe has been succesfully delete.
    <button class="btn-close" type="button" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card mb-5">
    <div class="card-body">
        <div class="row">
            <div class="col-auto">
                <a href="{{ route('employe.create') }}" class="btn btn-primary">
                    <i class="fas fa-circle-plus"></i> Create New Employee
                </a>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-hover m-0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Phone Number</th>
                    <th>Job Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $employes as $employe)
                <tr>
                    <td>{{ $employe->id }}</td>
                    <td>{{ $employe->fullname }}</td>
                    <td>{{ $employe->phone_number }}</td>
                    <td>{{ $employe->jobtitle }}</td>
                    <td>
                        <a href="{{ route('employe.show',['employe'=>$employe->id]) }}" class="btn btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('employe.edit',['employe'=>$employe->id]) }}" class="btn btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button class="btn btn-sm delete" type="button"
                        data-url="{{ route('employe.destroy',['employe'=>$employe->id]) }}">
                            <i class="fas fa-trash"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('modal')
<div class="modal" tabindex="-1" id="modalDelete">
    <div class="modal-dialog">
        <form action="#" method="post" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-trash"></i> Delete
                </h5>
                <button class="btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
                @csrf
                @method('delete')
                <p>Are you sure it will be deleted?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="submit"> Yes, Delete !</button>
            </div>
        </form>
    </div>
</div>
@endpush

@push('js')
<script>
$(function(){
    let modalDelete = new bootstrap.Modal( $('#modalDelete') );
    $('.delete').click(function(){
        let url = $(this).attr('data-url');
        $('#modalDelete form').attr('action', url);
        modelDelete.show();
    });
})
</script>
@endpush

