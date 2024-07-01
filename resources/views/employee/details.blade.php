@extends('layouts.app')

@section('title', 'Ninja HR | Employees')


@section('content')
    <div class="container">
        <h2> #Employees Details </h2> <hr>

        <div class="card p-3">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                            {{ $employee->name . "'s Details"}}
                    </li>
                </ol>
            </nav>
            <div>
                <ul>
                    <li>Employee_id : emp{{ $employee->id }} </li>
                    <li>Name : {{ $employee->name }} </li>
                    <li>Phone Number : {{ $employee->phone_no }} </li>
                    <li>Email : {{ $employee->email }} </li>
                    <li>Department : {{ $employee->department->title ?? 'no'}} </li>
                    <li>Birthday : {{ $employee->birthday ?? '-' }} </li>
                    <li>Gender : {{ $employee->gender ?? '-' }} </li>
                    <li>Date of Join : {{ $employee->date_of_join ?? '-' }} </li>
                    <li>Is_Present : {{ $employee->name ? 'present' : 'no'}} </li>
                </ul>
            </div>
        </div>
    </div>
@endsection