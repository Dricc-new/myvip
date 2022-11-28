<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAttachment extends Model
{
    use HasFactory;
    protected $table = 'types_attachments';
    protected $fillable = [
        'id',
        'type',
    ];
}
