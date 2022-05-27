<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function get_tag($group_id){
        return Group::where('id', $group_id)->first()->tag;
    }
}
