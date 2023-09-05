<?php

namespace App\Enums;

enum ReimburseStatus : string {
    case Pending  = 'Menunggu Konfirmasi';
    case Approve = 'Permintaan Disetujui';
    case Verified  = 'Permintaan Diverifikasi Finance';
    case Reject_Dir  = 'Permintaan Ditolak Direktur';
    case Reject_Fin  = 'Permintaan Ditolak Finance';
}
