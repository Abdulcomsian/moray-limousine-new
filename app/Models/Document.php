<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = "documents";
    protected $fillable = ['document_heading','document_sub_heading','document_title', 'document_img', 'applied_on', 'expiry_date_input','slug','text_for_expiry','back_image','image_below_text'];
}
