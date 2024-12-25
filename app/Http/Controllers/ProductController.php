<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class ProductController extends Controller
{   private $products = [ // กำหนดรายการสินค้าด้วย static array
        ['id' => 1, 'name' => 'Laptop',
        'description' => 'High-performance laptop',
        'price' => 1500,
        'image' => 'https://www.istudio.store/cdn/shop/files/macbook-air-m1-space-gray-001.jpg?v=1706069830&width=823'],
        ['id' => 2, 'name' => 'Smartphone',
            'description' => 'Latest smartphone with great features',
            'price' => 800,
            'image' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/iphone-16-pro-finish-select-202409-6-9inch-deserttitanium_FMT_WHH?wid=1280&hei=492&fmt=p-jpg&qlt=80&.v=eUdsd0dIb3VUOXdtWkY0VFUwVE8vbEdkZHNlSjBQRklnaFB2d3I5MW94NW9lRVVkRmJ5ZE03VysydEdnMXpSNHN5cGlJaGVIK3ZnWG94Q05QeVVhdG1HRHRkRXBiVzNmTDY4S2toSUp1WlZ5QlhBTS9Nc09TTHc1VjlyVmpqNThoMnJIK0xpK3FZWFh3bUNJUCtiK2ozRjI5QmdXb0JFUXlOckJCV3V1YVZv&traceId=1'
        ],
        ['id' => 3, 'name' => 'Tablet',
            'description' => 'Portable tablet for everyday use',
            'price' => 500,
            'image' => 'https://store.storeimages.cdn-apple.com/1/as-images.apple.com/is/ipad-air-storage-select-202405-13inch-starlight-wifi_FMT_WHH?wid=1280&hei=720&fmt=p-jpg&qlt=80&.v=TENLTVRoeFdHUUI5ZE1ZZmxpQUlNMm5pQUoxb0NIVEJFSjRVRzZ4dzV5VG9xblRoSytlREYxb2tmSnZTRlIvWmxzVWxuaTA3UGxIdzhKNUtuSEF5VlVtYW1kMXNQLzdDd2NuUVFzTDNlZmEyTE1mSHgwMHh1SlVoUDJNTksyTUZnWG04VnYwV0NCYVhKcVlFN0RlblJR&traceId=1'],
        ['id' => 4, 'name' => 'Airpods',
            'description' => 'Wireless headphones provide sound without wires.',
            'price' => 150,
            'image'=>'https://s.isanook.com/hi/0/ui/320/1603935/Apple-AirPods-4-with-case-240909.jpg'],
        ['id' => 5, 'name' => 'Smartwatch',
            'description' => 'Smartwatches track time, fitness, and notifications on your wrist.',
            'price' => 200,
            'image'=>'https://www.apple.com/newsroom/images/product/watch/standard/Apple_watch-series7_lp_09142021.jpg.og.jpg?202410300031'],
        ['id' => 6, 'name' => 'Televison',
            'description' => 'Televisions display video and audio for entertainment and media viewing.',
            'price' => 250,
            'image'=>'https://www.siamtv.com/uploads/3_189d3e83e0.jpg'],
        ['id' => 7, 'name' => 'Nintendo Switch',
            'description' => 'Nintendo is a gaming company known for consoles like the Switch and games',
            'price' => 300,
            'image'=>'https://res.cloudinary.com/itcity-production/image/upload/f_jpg,q_80,w_1000/v1658293212/products/PRD202206002466/skus/mfr4qnuzor8ruzpmf4hw.jpg'],
        ['id' => 8, 'name' => 'playsation 5',
            'description' => 'PS5 is a Sony gaming console with high performance and graphics.',
            'price' => 350,
            'image'=>'https://gmedia.playstation.com/is/image/SIEPDC/ps5-product-thumbnail-01-en-14sep21?$facebook$'],
        ['id' => 9, 'name' => 'Washing machine',
            'description' => 'A washing machine cleans clothes automatically and efficiently.',
            'price' => 300,
            'image'=>'https://cf.lnwfile.com/mhg9ep.webp'],
        ['id' => 10, 'name' => 'Electric bike',
            'description' => 'An electric bike provides powered cycling for easier and faster rides.',
            'price' => 250,
            'image'=>'https://static.thairath.co.th/media/Dtbezn3nNUxytg04ajY6iWn7pRSaBKIMZRIZdSt7dSiFD2.webp'],
        ['id' => 11, 'name' => 'Microwave',
            'description' => 'A microwave heats and cooks food quickly using electromagnetic waves.',
            'price' => 250,
            'image'=>'https://www.robertdyas.co.uk/media/catalog/product/3/0/307368_1.jpg?quality=80&bg-color=255,255,255&height=1200&width=1200&canvas=1200:1200'],
        ['id' => 12, 'name' => 'Air purifier',
            'description' => 'An air purifier removes pollutants for cleaner, healthier air.',
            'price' => 250,
            'image'=>'https://www.rung-ruengair.com/wp-content/uploads/2024/08/002-mc30zv1s.png']
         ];
            

    
    /**
     * แสดงรายการสินค้าบนหน้า Dashboard
     */
    public function dashboardProducts()
{// ส่งรายการสินค้าไปยัง component 'Dashboard'
    return Inertia::render('Dashboard', [
        'Products' => $this->products,
    ]);
}
/**
     * แสดงสินค้าทั้งหมดบนหน้า Index
     */
    public function index()
    {   // ส่งรายการสินค้าทั้งหมดไปยังหน้า Products/Index
        return Inertia::render('Products/Index',['Products'=>$this->products]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $product = collect($this->products)->firstWhere('id', $id);
        if (!$product) {
            abort(404, 'Product not found'); }
        return Inertia::render('Products/Show', ['product' => $product]); 

    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
