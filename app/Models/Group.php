<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public static function get_by_id($id){
        return Group::where('id', $id)->first();
    }

    public static function get_tag($group_id){
        return Group::where('id', $group_id)->first()->tag;
    }

    public static function get_by_faculty($faculty_id){
        return Group::where('faculty_id', $faculty_id)->get();
    }
}
