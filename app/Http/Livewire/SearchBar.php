<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use DB;

class SearchBar extends Component
{
    public $result = [];
    public $selected_category = 'all';
    public $query;
   
    public function suggest()
    {
        if($this->selected_category == 'all'){
            return  DB::table('products')->select('name')->where('name', 'like', "%$this->query%")->get()->take(8);
        }
        return DB::table('products')
                        ->select('name')
                        ->where('name', 'like', "%$this->query%")
                        ->where('category_id', $this->selected_category)
                        ->get()
                        ->take(8);
    }
    public function setproduct($product)
    {
        $this->query = $product;
        $this->results = [];
    }
    public function search()
    {

        redirect()->route('customer.product.list', [$this->selected_category,$this->query]);
    }
    public function render()
    {
        $results = $this->query?$this->suggest():[];
        $categories = Category::all();
        return view('livewire.search-bar', compact('categories', 'results'));
    }
}
