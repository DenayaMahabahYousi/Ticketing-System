<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Category;
use App\Models\user1;
use App\Models\Status;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = user1::with(['admin', 'status', 'category'])->get();
        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('user.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*Session::flash('name', $request->name);
        Session::flash('category_id', $request->get('category'));
        Session::flash('complaint', $request->complaint);*/

        $request->validate([
            'name' => 'required',
            'complaint' => 'required'
        ], [
            'name.required' => 'Nama harus diisi',
            'complaint.required' => 'Deskripsi Pengaduan harus diisi'
        ]);

        $current_date_time = Carbon::now()->toDateTimeString();

        $data = [
            'name' => $request->name,
            'category_id' => $request->get('category'),
            'complaint' => $request->complaint,
            'opened_at' => $current_date_time,
            'status_id' => 1,
            'admin_id' => null
        ];

        user1::create($data);
        return redirect()->to('user')->with('success','Berhasil mengirimkan pengaduan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
