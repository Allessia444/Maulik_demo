<?php

namespace App\Imports;
use App\User;
use App\UserProfile;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Department;
use App\Designation;
use Carbon\Carbon;
class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        
        if(Department::where('name','=',$row['department'])->count() >0){
            $department=Department::where('name','=',$row['department'])->first();
        }
        else{
            $department=new Department;
            $department->name=$row['department'];
            $department->save();
        }
        if(Designation:: where('name','=',$row['designation'])->count() >0){
            $designation=Designation::where('name','=',$row['designation'])->first();
        }
        else{
            $designation=new Designation;
            $designation->name=$row['designation'];
            $designation->save();
        }
        $user= new User;
            $user->designation_id=$designation->id;
            $user->department_id=$department->id;
            $user->first_name=$row['name'];
            $user->last_name=$row['lastname'];
            $user->password=Hash::make(1234);
            $user->email=$row['email'];
            $user->phone=trim($row['phone']);
            $user->role='user';
            $user->save();
        return new UserProfile([
            'user_id'=>$user->id,
            'first_name'=>$row['name'],
            'last_name'=>$row['lastname'],
            'mobile'=>$row['phone'],
            'address1'=>$row['address1'],
            'address2'=>$row['address2'],
            'city'=>$row['city'],
            'state'=>$row['state'],
            'country'=>$row['country'],
            
            'gender'=>$row['gender'],
            'management_level'=>$row['managementlevel'],
        ]);
    }
}
