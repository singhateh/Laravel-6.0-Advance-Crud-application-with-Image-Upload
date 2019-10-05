<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::latest()->paginate(3);
        return view('index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
                'first_name'    =>  'required',
                'last_name'     =>  'required',
                'gender'     =>  'required',
                'email'     =>  'required',
                'phone'     =>  'required',
                'image'         =>  'image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $input_data = array(
            'first_name'       =>   $request->first_name,
            'last_name'        =>   $request->last_name,
            'gender'        =>      $request->gender,
            'email'        =>       $request->email,
            'phone'        =>       $request->phone,
            'image'            =>   $new_name
        );

        Employee::create($input_data);

        return redirect('employee')->with('Success', 'Employee Inserted Successfully');
    }

    public function show($id)
    {
        $data = Employee::findOrFail($id);
        return view('show', compact('data'));
    }

  
    public function edit($id)
    {
        $data = Employee::findOrFail($id);
        return view('edit', compact('data'));
    }

 
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')  // here is the if part when you dont want to update the image required
        {
            $request->validate([
                'first_name'    =>  'required',
                'last_name'     =>  'required',
                'gender'     =>  'required',
                'email'     =>  'required',
                'phone'     =>  'required',
                'image'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else  // this is the else part when you dont want to update the image not required
        {
            $request->validate([
                'first_name'    =>  'required',
                'last_name'     =>  'required',
                'gender'     =>  'required',
                'email'     =>  'required',
                'phone'     =>  'required',
            ]);
        }

        $input_data = array(
            'first_name'       =>   $request->first_name,
            'last_name'        =>   $request->last_name,
            'gender'        =>      $request->gender,
            'email'        =>       $request->email,
            'phone'        =>       $request->phone,
            'image'            =>   $image_name
        );
  
        Employee::whereId($id)->update($input_data);

        return redirect('employee')->with('Success', 'Employee Updated Successfully');
    }

    
    public function destroy($id) //  here is the part for delete employee
    {
        $data = Employee::findOrFail($id);
        $data->delete();

        return redirect('employee')->with('error', 'Employee Deleted Successfully ');
    }
}