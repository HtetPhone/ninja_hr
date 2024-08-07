@extends('layouts.app')

@section('title', 'Ninja HR | Create Employees')

@section('content')
    <div class="container">
        <h2> #New_Employee </h2> <hr>

        <div class="card p-4 col-11 shadow">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('employee.index') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> New Employee </li>
                </ol>
            </nav>
            <div>
                <form method="POST" action="{{route('employee.create')}}" id="storeEmp">
                    @csrf
                    <div class="row">
                        {{-- Form Left --}}
                        <div class="col">
                            <div class="mb-3">
                                <label for="">Employee Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                @error('name')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Phone Number</label>
                                <input type="number" name="phone_no" class="form-control" value="{{ old('phone_no') }}" placeholder="09xxxxxxxx">
                                @error('phone_no')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Address</label>
                                @error('address')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                                <textarea name="address" id="" rows="4" class="form-control" >
                                    {{ old('address') }}
                                </textarea>
                            </div>
                        </div>

                        {{-- Form Right  --}}
                        <div class="col">
                            <div class="mb-3">
                                <label for="">NRC No.</label>
                                <input type="text" name="nrc_no" class="form-control" value="{{ old('nrc_no') }}">
                                @error('nrc_no')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Birthday</label>
                                <input type="date" name="birthday" class="form-control" min="1980-01-01" max="2009-10-01" value="{{ old('birthday') }}">
                                @error('birthday')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="mb-1">Gender</div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="male">
                                    <label>Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="female">
                                    <label>Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="other">
                                    <label>Other</label>
                                </div>
                                @error('gender')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                            <div class="mb-3 mt-4">
                                <div class="mb-1"> Department </div>
                                <select name="department_id" id="" class="form-select">
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option {{ old('department_id') === $department->id ? 'selected' : '' }} value="{{ $department->id }}"> {{ $department->title}} </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="">Date of Join</label>
                                <input type="date" name="date_of_join" class="form-control" min="1990-01-01" max="2024-10-01" value="{{ old('date_of_join') }}">
                                @error('date_of_join')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="create-btn btn btn-primary text-white fw-bold px-5"> 
                            <i class="bi bi-arrow-through-heart fs-5"></i> Create
                        </button>
                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    
@endpush
