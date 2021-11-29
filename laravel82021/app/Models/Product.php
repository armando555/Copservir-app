<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //attributes id, name, price, amount, iva, percentage, created_at, updated_at

    protected $fillable = ['name', 'price', 'amount', 'iva', 'percentage'];
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public static function validate(Request $request)
    {
        $request->validate(
            [
            "name" => "required",
            "iva" => "required",
            "amount" => "required|numeric|gt:0",
            "price" => "required|numeric|gt:0",
            ]
        );
    }

    public function getId()
    {

        return $this->attributes['id'];
    }

    public function setId($id)
    {

        $this->attributes['id'] = $id;
    }

    public function getName()
    {

        return $this->attributes['name'];
    }

    public function setName($name)
    {

        $this->attributes['name'] = $name;
    }

    public function getAmount()
    {

        return $this->attributes['amount'];
    }

    public function setAmount($amount)
    {

        $this->attributes['amount'] = $amount;
    }


    public function getPrice()
    {

        return $this->attributes['price'];
    }

    public function setPrice($price)
    {

        $this->attributes['price'] = $price;
    }

    public function getIva()
    {

        return $this->attributes['iva'];
    }

    public function setIva($iva)
    {

        $this->attributes['iva'] = $iva;
    }
    public function getPercentage()
    {

        return $this->attributes['percentage'];
    }

    public function setPercentage($percentage)
    {

        $this->attributes['percentage'] = $percentage;
    }
}