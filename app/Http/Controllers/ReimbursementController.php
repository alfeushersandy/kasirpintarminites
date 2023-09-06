<?php

namespace App\Http\Controllers;

use App\Enums\ReimburseStatus;
use App\Models\Reimbursement;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReimbursementController extends Controller
{
    use UploadFile;

    private $path = 'public/rembers/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rembers = Reimbursement::paginate(10);
        return view('reimbursement.index', compact('rembers'));
    }

    public function approve(Reimbursement $rembes)
    {
        if(Auth::user()->jabatan == 'Direktur')
        {
            $rembes->status = ReimburseStatus::Approve;
            $rembes->dir_appr = Auth::user()->id;
            $rembes->update();
        }else{
            $rembes->status = ReimburseStatus::Verified;
            $rembes->fin_appr = Auth::user()->id;
            $rembes->update();
        }
        

        return redirect(route('kasirpintar.reimburse.index'));
    }

    public function rejected(Reimbursement $rembes)
    {
        if(Auth::user()->jabatan == 'Direktur')
        {
            if($rembes->dir_appr){
                $rembes->status = ReimburseStatus::Reject_Dir;
                $rembes->dir_appr = "";
                $rembes->update();
            }

            $rembes->status = ReimburseStatus::Reject_Dir;
            $rembes->update();

        }else{
            if(!$rembes->dir_appr){
                return redirect(route('kasirpintar.reimburse.index'))->with('warning', 'Direktur belum memproses permintaan ini');
            }else{
                $rembes->status = ReimburseStatus::Reject_Fin;
                $rembes->update();
            }
        }
        

        return redirect(route('kasirpintar.reimburse.index'));
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
            'file' => 'required|mimes:jpg,pdf,png'
        ]);

        $file = $this->uploadFile($request, $this->path);

        $rembers = Reimbursement::latest()->first() ?? new Reimbursement();
        $kode_rembers = substr($rembers->kode,5);
        $kode_rembers_final = (int) $kode_rembers +1;

        Reimbursement::create([
            'user_id' => Auth::user()->id,
            'kode' => 'RMB-' . $kode_rembers_final,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah,
            'nama_reimburs'  => $request->nama_reimburse,
            'deskripsi' => $request->deskripsi,
            'file' => $file->hashName(),
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
