<?php

namespace App\Http\Controllers;

use App\Enums\ReimburseStatus;
use App\Models\Reimbursement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReimbursementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reimbursement.index');
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
        $request->validate([
            'tanggal' => 'required',
            'nama_reimburse' => 'required',
            'jumlah' => 'required',
            'file' => 'required|mime:jpg,pdf,png'
        ]);

        $rembers = Reimbursement::latest()->first() ?? new Reimbursement();
        $kode_rembers = substr($rembers->kode,5);
        $kode_rembers_final = (int) $kode_rembers +1;

        Reimbursement::create([
            'id_user' => Auth::user()->id,
            'kode' => 'RMB-' . $kode_rembers_final,
            'tanggal' => $request->tanggal,
            'nama_reimburs'  => $request->nama_reimburse,
            'deskripsi' => $request->deskripsi,
            'file' => $request->file,
        ]);

        return redirect(route('kasirpintar.reimburse.index'));
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
