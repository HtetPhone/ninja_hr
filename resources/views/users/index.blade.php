@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="card my-5">
            <div class="card-header">Manage Users</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
    <div class="p-5 my-3">
        
    </div>
    @push('scripts')
        {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    @endpush
@endsection
 
