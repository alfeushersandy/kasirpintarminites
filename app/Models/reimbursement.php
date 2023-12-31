<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Reimbursement extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'kode',
        'tanggal',
        'nama_reimburs',
        'deskripsi',
        'jumlah',
        'file',
        'status',
        'dir_appr',
        'fin_appr',
        'user_update',
        'user_delete'
    ];

    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn($file_upload) => asset('storage/rembers/' . $file_upload),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
