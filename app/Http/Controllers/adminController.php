<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Category;
use App\Models\user1;
use App\Models\Status;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = user1::with(['admin', 'status', 'category'])->get();
        return view('admin.index', compact('user'));
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
        $user = user1::where('admin_id', auth()->guard('admin')->user()->id)->get();
        return view('admin.forme', compact('user'));
    }

    public function software()
    {
        $user = user1::where('category_id',2)->get();
        return view('admin.software', compact('user'));
    }

    public function hardware()
    {
        $user = user1::where('category_id',1)->get();
        return view('admin.hardware', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = user1::where('id',$id)->first();
        $status = Status::all();
        return view('admin.edit', compact('user','status'));
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

        if ($request->get('status') == 2) {
            $data['process_at'] = $current_date_time;
        }elseif ($request->get('status') == 3) {
            $data['closed_at'] = $current_date_time;
        } else {
            $data['process_at'] = null;
            $data['closed_at'] = null;
        }

        user1::where('id',$id)->update($data);
        return redirect()->to('admin')->with('success','Berhasil melakukan update status');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        user1::where('id',$id)->delete();
        return redirect()->to('admin')->with('success','Berhasil menghapus data');
    }
}
