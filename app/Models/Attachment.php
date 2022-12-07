<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $table = 'attachments';
    protected $fillable = [
        'id',
        'filename',
        'driver',
        'type_id',
        'post_id',
    ];

    public function attacment_type()
    {
        return $this->belongsTo(AttachmentType::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }
}
