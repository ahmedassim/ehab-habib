<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    // Create New Doctor
    public function create_doctor()
    {
        return view('doctors.create_doctor');
    }
   
    public function store_doctor(Request $request)
    {
        // Validations
       $validator =  Validator::make($request->all(),
        [
            'name'   => 'required',
            'phone'  => 'required|numeric|unique:doctors,phone',
            'address' => 'required'
        ],
        
        [
            'name.required' => 'حقل الأسم مطلوب' ,
            'phone.required' => 'حقل رقم التليفون مطلوب',
            'phone.numeric' => 'رقم التليفون يجب ان يكون أرقام',
            'phone.unique' => 'هذا الرقم موجود مسبقا',
            'address.required' => 'حقل العنوان مطلوب'
        ]
        
       );
       
       if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInputs($request->flash());
       }
       
        Doctor::create([
            'name'     => $request->name ,
            'phone'    => $request->phone ,
            'address'  => $request->address
        ]);
        return redirect()->back()->with('success','Doctor Created Successfuly.');
    }

    // Get All Doctors
    public function show_doctors()
    {
       // $doctors =   Doctor::get();    // select * from doctors 
       $doctors = Doctor::paginate(PAGINATION);
        return view('doctors.show_doctors',compact('doctors'));
    }

     // Edit Doctor
     public function edit_doctor($id){
        $doctor =  Doctor::find($id);
        return view('doctors.edit_doctor',compact('doctor'));
     }

     public function update_doctor(Request $request,$id){
        $doctor = Doctor::find($id);
        $doctor->update([
            'name' => $request->name ,
            'phone' => $request->phone,
            'address' => $request->address 
        ]);
        return redirect()->back()->with('success','Doctor Updated Successfuly.');
     }

    // Destroy Doctor
    public function delete_doctor($id){
        $doctor =  Doctor::find($id);
        $doctor->delete();
        return redirect()->back()->with('deleted','Doctor Deleted Successfully');
    }
}
