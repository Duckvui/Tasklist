<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Task extends Model
{
    use HasFactory;

    // Đảm bảo khai báo các thuộc tính mà bạn muốn cho phép gán hàng loạt
    protected $fillable = [
        'title',
        'description',
        'long_description',
        'completed',
    ];
}
