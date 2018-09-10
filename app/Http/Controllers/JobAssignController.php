<?php

namespace App\Http\Controllers;

use App\JobAssign;
use App\JobAssignDetail;
use App\JobAssignOperator;
use App\Admin;
use App\Role;
use Illuminate\Http\Request;
use DB;
use File;
use Carbon\Carbon;

class JobAssignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobLists = JobAssign::all();
        return view('admin.job-assign.index', compact('jobLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd('here');
        $roles = Role::Where('roles.role','=',3)->get();
        return view('admin.job-assign.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $validatedData = $request->validate([
            'jobTitle' => 'required|string|max:255',
            'assignFile' => 'required',
            'fromDate' => 'required',
            'toDate' => 'required',
            'estimatedTime' => 'required|string|max:255',
            'created_by' => 'required',
        ]);

        //dd($request->all());

        $fromdate = Carbon::parse($request->fromDate);
        $todate = Carbon::parse($request->toDate);
        //dd($request->assign_operator);
        //dd($fromdate);

        DB::beginTransaction();

        try {

            $jobAssign = new JobAssign();
            $jobAssign->job_code = $request->jobTitle;
            $jobAssign->from_date = $fromdate;
            $jobAssign->to_date = $todate;
            $jobAssign->estimate_complete_time = $request->estimatedTime;
            $jobAssign->operator_id = $request->input('assign_operator');
            $jobAssign->created_by = $request->created_by;
            $jobAssign->save();

            $job_assign_id = $jobAssign->id;
            $img_name = '';
            $j = count($request->assignFile);
            $month_year = date('m-Y/');
            $destinationPath = '/images/assign/'.$month_year;
            
            for ($i=0; $i < $j ; $i++) { 
                $image = $request->assignFile[$i];                
                $image_name = str_random(3).'_prod.'.$image->getClientOriginalExtension();                
                $image->move(public_path().$destinationPath, $image_name);
  
                $img_name = $image_name;

                JobAssignDetail::create([
                    'job_assign_id' => $job_assign_id,
                    'file_path' => $destinationPath,
                    'file_name' => $img_name,
                ]);

            }

            DB::commit();

            return redirect('admin/job-assign')->with('success', 'Successfully Add New Product!');

        } catch (Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobAssign  $jobAssign
     * @return \Illuminate\Http\Response
     */
    public function show(JobAssign $jobAssign)
    {
        //dd($jobAssign);
        $role = '';
        $name = '';
        $names = [];
        foreach($jobAssign->operator_id as $optId)
        {
            $role = Role::Where('roles.id','=',$optId)->select('roles.name')->get();
            $name = $role[0]->name;
            $names[] = $name;
        }
        //dd($names);

        $assignPhotos = JobAssignDetail::Where('job_assign_details.job_assign_id','=',$jobAssign->id)->get();
        //dd($assignPhotos);
        
        return view('admin.job-assign.show', compact('jobAssign','assignPhotos','names'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobAssign  $jobAssign
     * @return \Illuminate\Http\Response
     */
    public function edit(JobAssign $jobAssign)
    {
        $roles = Role::Where('roles.role','=',3)->get();

        $date = date_create($jobAssign->from_date);
        $fromdate = date_format($date, 'd-m-Y H:i:s');

        $todate = date_create($jobAssign->to_date);
        $todate = date_format($todate, 'd-m-Y H:i:s');
        

        return view('admin.job-assign.edit', compact('jobAssign','roles','fromdate','todate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobAssign  $jobAssign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobAssign $jobAssign)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'jobTitle' => 'required|string|max:255',
            'fromDate' => 'required',
            'toDate' => 'required',
            'estimatedTime' => 'required|string|max:255',
            'updated_by' => 'required',
        ]);

        $fromdate = Carbon::parse($request->fromDate);
        $todate = Carbon::parse($request->toDate);
        $operator = $request->assign_operator;
        //dd($operator);

        DB::beginTransaction();

        try {

            $data = array(
                'job_code' => $request->jobTitle,
                'from_date' => $fromdate,
                'to_date' => $todate,
                'estimate_complete_time' => $request->estimatedTime,
                'operator_id' => json_encode($operator),
                'update_by' => $request->updated_by
            );
            JobAssign::where('job_assigns.id','=',$jobAssign->id)->update($data);

            if($request->assignFile != null){
                $details = JobAssignDetail::where('job_assign_details.job_assign_id','=',$jobAssign->id)->get();
                foreach($details as $detail){
                    $detail->deleted_at = now();
                    $detail->save();
                }

                $job_assign_id = $jobAssign->id;
                $img_name = '';
                $j = count($request->assignFile);
                $month_year = date('m-Y/');
                $destinationPath = '/images/assign/'.$month_year;
                
                for ($i=0; $i < $j ; $i++) { 
                    $image = $request->assignFile[$i];                
                    $image_name = str_random(3).'_prod.'.$image->getClientOriginalExtension();                
                    $image->move(public_path().$destinationPath, $image_name);
      
                    $img_name = $image_name;

                    JobAssignDetail::create([
                        'job_assign_id' => $job_assign_id,
                        'file_path' => $destinationPath,
                        'file_name' => $img_name,
                    ]);

                }

                DB::commit();

            }

            return redirect('admin/job-assign')->with('success', 'Successfully Add New Product!');

        } catch (Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobAssign  $jobAssign
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobAssign $jobAssign)
    {
        //
    }
}
