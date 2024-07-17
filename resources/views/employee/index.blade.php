@extends('layouts.app')

@section('title', 'Ninja HR | Employees')


@section('content')
    <div class="container">
        <h2> <a href="{{ route('employee.index') }}" class="nav-link"> #Employees</a> </h2> <hr>

        <div class="card p-3">
            <div class="d-flex justify-content-between mb-3">
                <button class="btn btn-primary text-white btn-sm new-em">
                    <a class="nav-link" href="{{ route('employee.create') }}"> 
                        <i class="bi bi-plus-circle"></i> New Employee
                    </a>
                </button>
                <div>
                    <form method="GET" action="{{ route('employee.search') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" 
                            name="search"
                            value="{{ isset($search) ? $search : ''}}" 
                            class="form-control">
                            @isset($search)
                                <a href="{{ route('employee.index') }}" title="clear" class="btn btn-danger btn-sm"> <i class="bi bi-x fs-5"></i> </a>
                            @endisset
                            <button type="submit" class="btn btn-primary"> <i class="bi bi-search text-white"></i> </button>
                        </div>
                    </form>
                </div>
            </div>
            <table class="table table-stripe table-hover mb-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee_ID</th>
                        <th>Name</th>
                        <th>Phone No.</th>
                        <th>Deparment</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees  as $key => $employee)
                        <tr> 
                            <td> {{ $key + 1 }} </td>
                            <td> emp_id </td>
                            <td> {{ $employee->name }} </td>
                            <td> {{ $employee->phone_no }} </td>
                            <td> {{ $employee->department_id ? $employee->department->title : '-' }} </td>
                            <td> 
                                <div class="btn-group">
                                    <a title="See Details" href="{{ route('employee.details', $employee) }}" title="details" class="btn btn-sm btn-outline-dark"> <i class="bi bi-eye-fill"></i> </a>
                                    <a title="Edit" href="{{ route('employee.edit', $employee) }}" class="btn btn-sm btn-outline-dark">
                                        <i class="bi bi-pencil-square"></i>  
                                    </a>
                                    <button title="Delete" form="deleteEmp{{ $employee->id }}" type="submit" class="btn btn-sm btn-outline-dark"> <i class="bi bi-trash"></i> </button>
                                    <form class="hidden" id="deleteEmp{{ $employee->id }}" method="POST" action="">
                                        @csrf
                                        @method('delete')
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
@endsection