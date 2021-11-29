<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    //attributes id, amount, subtotal, subtotal_iva, order_id, product_id, created_at, updated_at

    protected $fillable = ['amount', 'subtotal', 'subtotal_iva', 'order_id'];
    
    public static function validate(Request $request)
    {
        $request->validate(
            [
            "type" => "required",
            "amount" => "required|numeric|gt:0",
            "subtotal" => "required|numeric|gt:0",
            "subtotal_iva" => "required|numeric|gt:0",
            "order_id" => "required",
            ]
        );
    }

    public function getId()
    {

        return $this->attributes['name'];
    }

    public function setId($name)
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

    public function getSubtotal()
    {

        return $this->attributes['subtotal'];
    }

    public function setSubtotal($subtotal)
    {

        $this->attributes['subtotal'] = $subtotal;
    }

    public function getSubtotalIva()
    {

        return $this->attributes['subtotal_iva'];
    }

    public function setSubtotalIva($subtotal)
    {

        $this->attributes['subtotal_iva'] = $subtotal;
    }

    public function getOrderId()
    {

        return $this->attributes['order_id'];
    }

    public function setOrderId($order_id)
    {

        $this->attributes['order_id'] = $order_id;
    }

    public function getProductId()
    {

        return $this->attributes['product_id'];
    }

    public function setProductId($product_id)
    {

        $this->attributes['product_id'] = $product_id;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}