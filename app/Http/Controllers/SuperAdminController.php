<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Category;
use App\Models\user1;
use App\Models\Status;
use App\Models\Admin;
use Carbon\Carbon;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = user1::with(['admin', 'status', 'category'])->get();
        return view('super_admin.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = user1::whereNotNull('admin_id')->get();
        return view('super_admin.assigned', compact('user'));
    }

    public function software()
    {
        $user = user1::where('category_id',2)->get();
        return view('super_admin.software', compact('user'));
    }

    public function hardware()
    {
        $user = user1::where('category_id',1)->get();
        return view('super_admin.hardware', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = user1::where('id',$id)->first();
        $status = Status::all();
        $admin = Admin::where('role','admin')->get();
        return view('super_admin.edit', compact('user','status','admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $current_date_time = Carbon::now()->toDateTimeString();

        $data = [
            'status_id' => $request->get('status'),
            'answer' => $request->answer
        ];

        if ($request->get('admin') == 0){
            $data['admin_id'] = null;
        }else{
            $data['admin_id'] = $request->get('admin');
        }

        if ($request->get('status') == 2) {
            $data['process_at'] = $current_date_time;
            $data['closed_at'] = null;
        }elseif ($request->get('status') == 3) {
            $data['closed_at'] = $current_date_time;
        } else {
            $data['process_at'] = null;
            $data['closed_at'] = null;
        }

        user1::where('id',$id)->update($data);
        return redirect()->to('super_admin')->with('success','Berhasil melakukan update status');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        user1::where('id',$id)->delete();
        return redirect()->to('super_admin')->with('success','Berhasil menghapus data');
    }
}
