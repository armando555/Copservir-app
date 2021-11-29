<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    
    public function index(Request $request)
    {
        $products = [];
        $idProducts = $request->session()->get('products');
        $quantity =$request->session()->get('quantity');
        $acu = 0;
        $acuIva = 0;
        if(!is_null($quantity)) {
            foreach (array_keys($quantity) as $id) {
                $obj = Product::findOrFail($id);
                $acu = $acu + $obj->getPrice() * $quantity[$id];
                $acuIva = $acuIva + ($obj->getPrice() * $quantity[$id])+(($obj->getPrice() * $quantity[$id])*($obj->getPercentage()/100));
            }
        }
                
        //dd($idFlowers,$quantityFlower);
        if(gettype($idProducts) == "array") {
            $products["products"] = Product::find(array_values($idProducts));
        }
        //dd($products,$acu,$quantity);
        return view('cart.index')->with("data", $products)->with("quantity", $quantity)->with("acu", $acu)->with("acuIva",$acuIva);
        //dd($products);
    }

    public function sell( Request $request)
    {
        $idProducts = $request->session()->get('products');
        $quantity = $request->session()->get('quantity');
        $total = 0;
        $totalIva = 0;
        if(!is_null($idProducts)) {
            $order = new Order();
            $order->setTotal(0);
            if(Auth::check()) {
                $order->setUserId(auth()->user()->id);
            }            
            $order->save();            
            if(!is_null($idProducts)) {
                $products = Product::find(array_values($idProducts));
                foreach ($products as $product) {
                    $item = new Item();
                    $item->setOrderId($order->getId());
                    $item->setProductId($product->getId());
                    $item->setSubtotal($product->getPrice()*$quantity[$product->getId()]);
                    $item->setSubtotalIva($product->getPrice()*$quantity[$product->getId()]+($product->getPrice()*$quantity[$product->getId()]*($product->getPercentage()/100)));
                    $item->setAmount($quantity[$product->getId()]);
                    $total += $product->getPrice()*$quantity[$product->getId()];
                    $totalIva += $product->getPrice()*$quantity[$product->getId()]+($product->getPrice()*$quantity[$product->getId()]*($product->getPercentage()/100));
                    $productoUpdate = Product::findOrFail($product->getId());
                    $productoUpdate->setAmount($product->getAmount()-$quantity[$product->getId()]);
                    $productoUpdate->save();
                    $item->save();
                }
            }
            $order->setTotal($total);
            $order->setTotalIva($totalIva);
            $order->save();
            $items = $order->items()->get();
            
            //$user = $order->user()->get();
        }        
        return view("cart.generatePdf")->with("order", $order)->with("items", $items)->with("user", "Copservir LTDA");
    }
}
