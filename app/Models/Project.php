<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
protected $fillable = ['title', 'description', 'project_url', 'image', 'status'];

}
