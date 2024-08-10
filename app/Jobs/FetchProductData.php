<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class FetchProductData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $response = Http::get('http://dasnube.com/api/productos/stock/a77a9a00bc535a4b7d7cb15cce1f5356');

        $data = $response->json();

        foreach ($data as $productData) {
            Product::updateOrCreate(
                ['id_producto' => $productData['id_producto']],
                [
                    'codigo_barras' => $productData['codigo_barras'],
                    'descripcion' => $productData['descripcion'],
                    'nombre_producto' => $productData['nombre_producto'],
                    'categoria' => $productData['categoria'],
                    'id_familiar' => $productData['id_familiar'],
                    'id_linea_web' => $productData['id_linea_web'],
                    'stock' => $productData['stock'],
                    'precio_publico' => $productData['precio_publico'],
                    'precio_cliente' => $productData['precio_cliente'],
                    'cantidad' => $productData['cantidad'],
                    'descuento' => $productData['Descuento']
                ]
            );
        }
    }
}
