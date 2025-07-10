<?php

namespace App\Http\Controllers;
use App\Models\Members;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class MembersController extends Controller
{
    //
    public function members(){
        // $members = Members::all();
        $members = Members::with('user')->get();

        return view('admin.members', ['members' => $members]);
    }

    public function addMember(){
        return view('admin.add');
    }
    public function storeMember(Request $request){


     


             $request->validate([
                    'firstName' => ['required', 'string', 'max:255'],
                    'middleName' => ['required', 'string', 'max:255'],
                    'lastName' => ['required', 'string', 'max:255'],
                    'studentNumber' => ['required', 'string', 'max:255', 'unique:members,studentNumber'],
                    'course' => ['required', 'string', 'in:BSCPE,DCPET'],
                    'gender' =>['required', 'in:Female,Male,LGBTQ+'],
                    'contactNumber' =>['required', 'string'],

                    'yearLevel' => ['required', 'in:1st,2nd,3rd,4th'],
                    'address' => ['required', 'string', 'max:255'],
                    'age' => ['required', 'string'],
                    'studentStatus' => ['required', 'in:Regular,Irregular,Alumni'],
                    'birthDate' => ['required', 'date', 'before:today'],
                    'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
  // dd('Validation passed');

    // Create Member first
                $member = Members::create([
                    'firstName' => $request->firstName,
                    'middleName' => $request->middleName,
                    'lastName' => $request->lastName,
                    'studentNumber' => $request->studentNumber,
                    'course' => $request->course,
                    'gender' =>$request->gender,
                    'contactNumber' =>$request->contactNumber,
                    'yearLevel' => $request->yearLevel,
                    'address' => $request->address,
                    'age' => $request->age,
                    'studentStatus' => $request->studentStatus,
                    'birthDate' =>$request->birthDate,
                ]);

                // Then create User and assign member_id
                $user = User::create([
                    'name' => $request->firstName,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'member_id' => $member->id, 
                ]);

                return redirect()->route('admin.members')->with('success', 'Member added successfully!');

    }

    public function editMember(Members $member){
        return view('admin.edit',['member' =>$member]);

    }
    public function updateMember(Request $request, Members $member){
//validate updated data
$data =$request ->validate(
    [
                'firstName' => ['required', 'string', 'max:255'],
                'middleName' => ['required', 'string', 'max:255'],
                'lastName' => ['required', 'string', 'max:255'],
                'studentNumber' => ['required', 'string', 'max:255', ],
                'course' => ['required', 'string', 'in:BSCPE,DCPET'],
                'gender' =>['required', 'in:Female,Male,LGBTQ+'],
                'contactNumber' =>['required', 'string'],

                'yearLevel' => ['required', 'in:1st,2nd,3rd,4th'],
                'address' => ['required', 'string', 'max:255'],
                'age' => ['required', 'string'],
                'studentStatus' => ['required', 'in:Regular,Irregular,Alumni'],
                'birthDate' => ['required', 'date', 'before:today'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255',],
         ]
    );
    $member ->update($data);
    return redirect(route('admin.members'))->with('success', 'Member Information Updated Successfully');


    }
    public function deleteMember(Members $member){
        $member ->delete();
        return redirect(route('admin.members'))->with('success', 'Member Deleted Successfully');
        

    }
}
