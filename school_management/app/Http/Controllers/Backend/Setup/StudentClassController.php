<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function ViewStudent()
    {
        $data['allData'] = StudentClass::paginate(1);
        return view('backend.setup.student_class.view_class', $data);
    }

    public function StudentClassAdd()
    {

        return view('backend.setup.student_class.add_class');
    }
    public function StudentClassStore(Request $request)
    {


        $validatedData = $request->validate([


            'name' => 'required|unique:student_classes,name',

        ]);

        $data = new StudentClass();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Inserted Successfully',
            'alert-type' => 'info'


        );
        return redirect()->route('student.class.view')->with($notification);
    }
    public function StudentClassEdit($id)
    {

        $editData = StudentClass::find($id);

        return view('backend.setup.student_class.edit_class', compact('editData'));
    }

    public function StudentClassUpdate(Request $request, $id)
    {

        $data = StudentClass::find($id);

        $validatedData = $request->validate([


            'name' => 'required|unique:student_classes,name',

        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => 'Student Class Updated Successfully',
            'alert-type' => 'info'


        );
        return redirect()->route('student.class.view')->with($notification);
    }


    public function StudentClassDelete($id)
    {
        $data = StudentClass::find($id);
        $data->delete();
        $notification = array(
            'message' => 'Student Class Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassPagination(Request $request)
    {

        $data['allData'] = StudentClass::paginate(2);
        return view('backend.setup.student_class.paginate_class', $data)->render();
    }
}
