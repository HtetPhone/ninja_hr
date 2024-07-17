<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployee;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use JsValidator;

class EmployeeController extends Controller
{
    protected $validationRules = [
        'name' => 'required|unique|max:255',
    ];

    public function index()
    {
        $employees = User::latest('id')->paginate(15)->withQueryString();
        return view('employee.index', compact('employees'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $employees = User::where(function($query) use ($search)
        {
            $query->where('name', 'like', '%' .$search . '%')
            ->orWhere('phone_no', 'like', '%' .$search . '%')
            ->orWhere('email', 'like', '%' .$search . '%')
            ->orWhere('nrc_no', 'like', '%' .$search . '%')
            ->orWhere('address', 'like', '%' .$search . '%')
            ->orWhere('date_of_join', 'like', '%' .$search . '%')
            ->orWhere('birthday', 'like', '%' .$search . '%');
        })
        ->orWhereHas('department', function($query) use ($search)
        {
            $query->where('title', 'like', '%' .$search . '%');
        })
        ->paginate(15)
        ->withQueryString();

        return view('employee.index', compact('employees', 'search'));
    }

    public function details(User $employee)
    {
        return view('employee.details', compact('employee'));
    }

    public function create()
    {
        $departments = Department::get();
        return view('employee.create', compact('departments'));
    }
    
    public function store(StoreEmployee $request)
    {
        $employee = $request->validated();
        $employee['password'] = Hash::make($request->password);
        User::create($employee);
        return redirect()->route('employee.index')->with(['success' => 'New Employee is added!']);
    }

    public function edit(User $employee)
    {
        $departments = Department::get();
        return view('employee.edit', compact('employee', 'departments'));
    }
}
