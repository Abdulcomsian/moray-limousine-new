<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsPage extends Model
{
    use HasFactory;

    protected $table = "about_us_content";

    protected $fillable = [
        'section_1_heading',
        'section_1_description',
        'section_2_heading',
        'section_2_first_step_heading',
        'section_2_first_step_description',
        'section_2_second_step_heading',
        'section_2_second_step_description',
        'section_2_third_step_heading',
        'section_2_third_step_description',
        'section_3_heading',
        'section_3_first_step_heading',
        'section_3_first_step_description',
        'section_3_second_step_heading',
        'section_3_second_step_description',
        'section_3_third_step_heading',
        'section_3_third_step_description',
        'section_3_image',
    ];
}
