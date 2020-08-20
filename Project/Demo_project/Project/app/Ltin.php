<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ltin extends Model
{
    protected $table = "Ltin";
    protected $primaryKey = "tloai_id";
    protected $fillable = ['id','name','tloai_id'];
    
    public function Tloai()
    {
        return $this->belongsTo('App\model\Tloai','id');
    } 
    

    public function Tintuc()
    {
        return $this->hasMany('App\model\Tintuc','ltin_id','id');
    } 
}