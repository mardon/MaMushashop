<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductsTableSeeder extends Seeder {
    public function run()
    {
        DB::table('products')->delete();
        Product::create(array(
            'name'=>'Náhrdelník swarowski',
            'description'=>'Nový luxusní náhrdelník swarovski',
            'slug'=>'nahrdelnik-swarowski',
            'price'=>'1001.40',
        ));
        Product::create(array(
            'name'=>'Prstýnek chirurgická ocel',
            'description'=>'Potěší každou slečnu nebo paní.',
            'slug'=>'prstynek-chirurgicka-ocel',
            'price'=>'100.50',
        ));
        Product::create(array(
            'name'=>'Náramek pro meditaci',
            'description'=>'Meditační náramek přímo z Indie',
            'slug'=>'meditacni-naramek',
            'price'=>'250',
        ));
    }
}