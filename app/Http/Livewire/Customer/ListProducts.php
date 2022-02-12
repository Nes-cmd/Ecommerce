<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use DB;

class ListProducts extends Component
{
    public $totalPage;
    public $current = 1;
    public $products;
    public $name;
    public $category;
    // public $mainProduct;
    public function mount($category = 'all', $name = '%')
    {
        $this->category = $category;
        $this->name = $name;
        // $this->mainProduct = $this->fetchProducts();
    }
    public function nextPage()
    {
        $current =  $this->current;
        if ($current ==  $this->totalPage) {
            return;
        }
        else{
            $this->current++;
        }
        // $this->current = $this->current >=  $this->totalPage?$this->totalPage:$this->current++;
    }
    public function prevPage()
    {
        $current =  $this->current;
        if ($current == 1) {
            return;
        }
        else{
            $this->current--;
        }
    }
    public function toPage($page)
    {
        $this->current = $page;
    }
    
    public function render()
    {
        $this->products = $this->fetchProducts();
        return view('livewire.customer.list-products');
    }

    public function fetchProducts()
    {
        $productPerPage = 15;
        $offset = $this->current-1;
        
        if ($this->category == 'all') {
            $maximum = DB::table('products')->count();
            $products = DB::table('categories')
                            ->join('products', 'products.category_id','=', 'categories.id')
                            ->where('products.name', 'like', "%$this->name%")
                            ->offset($offset * $productPerPage)
                            ->take(15)
                            ->select('categories.category_name', 'products.*')
                            ->get();
                        }
        else {
            // $this->totalPage = ceil( DB::table('products')->where('category_id', $this->category)->count() / $productPerPage);
            $maximum = DB::table('products')->where('category_id', $this->category)->count();
            $products = \DB::table('categories')
                            ->join('products', 'products.category_id','=', 'categories.id')
                            ->where('products.name', 'like', "%$this->name%")
                            ->where('products.category_id', $this->category)
                            ->offset($offset * $productPerPage)
                            ->take(15)
                            ->select('categories.category_name', 'products.*')
                            ->get();
                        }
        if($maximum > $products->count()){
            $this->totalPage = ceil($maximum/$productPerPage);
        }
        else {
            $this->totalPage = ceil($products->count()/$productPerPage);
        }
        return $products->groupBy('category_id');
    }
}
