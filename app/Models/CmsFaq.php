<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CmsFaq extends Model
{
    protected $table = 'cms_faqs';
    protected $fillable = ['title','title2','faq_question','faq_answer'];
}
