<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class generateReportController extends Controller
{
    public function generate($id, Request $request)
    {
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($this->convert_data_to_html($id));
        $request->session()->forget('products');
        $request->session()->forget('quantity');
        return $pdf->download('report.pdf');
    }
    public function convert_data_to_html($id)
    {
        $data = Order::where("id", $id)->get();
        $order = $data[0];
        $items = $order->items()->get();
        //dd($order->getTotal());
        $output = '
        <h1 align="center">La rebaja droguería y minimarket</h1>
        <h2># Factura de venta</h2>
        <h2>' . $order->getId() . '</h2>
        <h2>Empresa</h2>
        <h2>CopServir LTDA</h2>
        <table width="100%" style="border-collapse:collapse;border:0px;">
            <tr>
                <th style="border:1px solid;padding:12px;" width=20%>Nombre del producto</th>
                <th style="border:1px solid;padding:12px;" width=20%>Precio del producto por unidad</th>
                <th style="border:1px solid;padding:12px;" width=20%>Cantidad</th>
                <th style="border:1px solid;padding:12px;" width=20%>Subtotal without IVA</th>
                <th style="border:1px solid;padding:12px;" width=20%>Subtotal with IVA</th>
            </tr>';
        foreach ($items as $item) {
            $product = $item->product()->get();
            $output .= '
                        <tr>
                            <td>' . $product[0]->getName() . '</td>
                            <td>' . $product[0]->getprice() . '</td>                         
                            <td>' . $item->getAmount() . '</td>
                            <td>' . $item->getSubtotal() . '</td>
                            <td>' . $item->getSubtotalIva() . '</td>
                        </tr>';
        }
        $output .= '</table>';
        $output .= '<h1>Total without</h1>' . $order->getTotal();
        $output .= '<h1>Total with Iva</h1>' . $order->getTotalIva();

        return $output;
    }
}
