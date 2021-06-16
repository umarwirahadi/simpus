<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table="items";
    protected $fillable=['kode','item','kategori','status'];
    // public static function boot(){
    //     parent::boot();
    //     static::creating(function($item){
    //         $item->created_at=date('y-m-d h:m:s');
    //     });
    // }
}
