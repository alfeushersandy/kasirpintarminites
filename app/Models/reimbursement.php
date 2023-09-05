<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class reimbursement extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'tanggal',
        'nama_reimburs',
        'deskripsi',
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
            get: fn($file_upload) => asset('storage/reimburse/' . $file_upload),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
