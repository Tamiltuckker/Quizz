<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $table='attachments';

    protected $fillable = ['image', 'attachmentable_type', 'attachmentable_id'];

    //relation 
    public function attachmentable()
    {
        return $this->morphTo(Attachment::class,'attachmentable_id','attachmentable_type');
    }
}
