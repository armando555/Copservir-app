<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    //attributes id, total, , created_at, updated_at

    protected $fillable = ['total','total_iva'];
    
    public static function validate(Request $request)
    {
        $request->validate(
            [
            "total" => "required|numeric|gt:0",
            "total_iva" => "required|numeric|gt:0",
            ]
        );
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'order_id', 'id');
    }

    public function getId()
    {

        return $this->attributes['id'];
    }

    public function setId($id)
    {

        $this->attributes['id'] = $id;
    }

    public function getTotal()
    {

        return $this->attributes['total'];
    }

    public function setTotal($total)
    {

        $this->attributes['total'] = $total;
    }

    public function getDate()
    {

        return $this->attributes['created_at'];
    }

    public function setDate($date)
    {

        $this->attributes['created_at'] = $date;
    }    
}