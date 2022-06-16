<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Leaves;
use App\Models\LeavesType;
use App\Models\Departments;
use App\Models\Designations;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class LeavesController extends Controller
{
    public function leavesList()
    {
        $key=null;
        if(request()->search){
            $key=request()->search;
            $leaves=Leaves::with('leaveType')->whereIn('status',array('Approved','Denied'))
            ->whereLike(['leaveType.name','name','email','start_date','end_date','days','reason','feedback','status'],$key)
            ->get();
            return view('admin.pages.leaves-list',compact('leaves','key'));
        }

        $leaves=Leaves::with('leaveType')->whereIn('status',array('Approved','Denied'))->get();
        
        return view('admin.pages.leaves-list',compact('leaves','key'));
    }

    

    public function apply(){
        $leaves_types=LeavesType::where('status','Active')->get();
        return view('admin.pages.leaves-apply',compact('leaves_types'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        function dateDiffInDays($start_date, $end_date) 
         {
            $diff = strtotime($end_date) - strtotime($start_date);
            return abs(round($diff / 86400));
        }


        Leaves::Create([
            //db feild name || form field name
            'e_id'=>$request->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'leave_type_name'=>$request->leave_type,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'days'=>dateDiffInDays($request->start_date, $request->end_date)+1,
            'reason'=>$request->reason
        ]);
        return redirect()->route('admin.leaves.approve')->with('msg','Apply for leave successfully.');
    }

    public function leavesApprove()
    {
        $leaves=Leaves::where('status','Hold')->get();
        return view('admin.pages.leaves-approve',compact('leaves'));
    }

    public function leavesApproveGive($id){
        $leave=Leaves::find($id);
        return view('admin.pages.leaves-approval-give',compact('leave'));
    }

    public function leavesApproveStore(Request $request, $id){
        $leave=Leaves::find($id);

        Mail::raw('Modarator changed your application status of leave to '.$request->approval.'. ', function ($message) use ($leave) {
            $message->to($leave->email)
                ->subject('Leave Status Updated');
        });


        $leave->update([

            'status'=>$request->approval,
            'feedback'=>$request->feedback
        ]);
        

        return redirect()->route('admin.leaves.approve')->with('msg','Approval status for leave successfully updated.');
    }

    public function leavesReport()
    {
        $reports=[];
        if(request()->has('fromdate'))
        {
            $from_date=request()->fromdate;
            $to_date=request()->todate;
            
            $reports=Leaves::whereBetween('start_date',[$from_date,$to_date])->get();

        
        }
        return view('admin.pages.leaves-report',compact('reports'));
    }

    public function employeeleavesAvailabe($id){
        $leave1=Leaves::find($id);
        // dd($leave1);
        $leaves=Leaves::where('status','Approved')->where('email',$leave1->email)->get();
        // dd($leaves);
        
        $leaves_types=LeavesType::where('status','Active')->get();

        return view('admin.pages.leaves-available',compact('leaves_types','leaves','leave1'));

    }


    public function leavesDetails($id){
        $leave=Leaves::find($id);
        return view('admin.pages.leaves-details',compact('leave'));
    }

    public function leavesEdit($id){
        $leave=Leaves::find($id);
        $leaves_types=LeavesType::all();
        return view('admin.pages.leaves-edit',compact('leave','leaves_types'));
    }

    public function leavesUpdate(Request $request, $id){
        $leave=Leaves::find($id);


        function dateDiffInDays($start_date, $end_date) 
         {
            $diff = strtotime($end_date) - strtotime($start_date);
            return abs(round($diff / 86400));
        }



        $leave->update([

            //db feild name || form field name
            'name'=>$request->name,
            'email'=>$request->email,
            'leave_type_name'=>$request->leave_type,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'days'=>dateDiffInDays($request->start_date, $request->end_date)+1,
            'reason'=>$request->reason,
            'feedback'=>$request->feedback,
            'status'=>$request->status
        ]);

        return redirect()->route('admin.leaves.list')->with('msg','Leave successfully updated.');
    }

    public function leavesDelete($id){
        Leaves::find($id)->delete();
        return redirect()->route('admin.leaves.list')->with('msg','Leave successfully deleted.');
    }
    
}
