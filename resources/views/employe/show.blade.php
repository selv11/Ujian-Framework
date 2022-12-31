@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-6 col-lg-4">
        <div class="card">
            <div class="card-header">
                Detail Employe
            </div>
            <div class="card-body">
                <p>ID : {{ $employe->id }}</p>
                <p>Fullname : <strong>{{ $employe->fullname }}</strong></p>
                <p>Phone Number : {{ $employe->phone_number }}</p>
                <p>Job Title : {{ $employe->jobtitle }}</p>
                <p>Created: <small class="text-muted">{{ $employe->created_at->format('d/m/Y H:i:s') }}</small></p>
                <p>Last Update: <small class="text-muted">{{ $employe->updated_at->format('d/m/Y H:i:s') }}</small></p>
            </div>
        </div>
    </div>
@endsection
        