<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachmentType extends Model
{
    use HasFactory;
    protected $table = 'attachment_types';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
    ];

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
