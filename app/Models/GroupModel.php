<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupModel extends Model
{
    use HasFactory;

    public function get_id($tag){
        return GroupModel::where('tag', $tag)->first()->id;
    }
}
