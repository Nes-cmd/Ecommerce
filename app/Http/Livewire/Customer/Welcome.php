<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subscriber;
use DB;
class Welcome extends Component
{
    public $category;
    public $subscriber_email;
    
    public function subscribe()
    {
        $this->validate([
            'subscriber_email' => 'required'
        ]);
        Subscriber::create(['email' => $this->subscriber_email]);
        session()->flash('subscribed' , 'Thank you to subscribe to our newslater');
        $this->subscriber_email = '';
        redirect()->route('customer.welcome');
    }
    public function render() 
    {
        $products = DB::table('categories')
                    ->join('products', 'products.category_id','=', 'categories.id')
                    ->where('categories.onfront_page', 1)
                    ->select('categories.category_name', 'products.*')
                    ->get()
                    ->groupBy('category_id');
        $specials = Product::where('speciality', 1)->get();
        // $categoryies = \DB::table('categories')->select('id')->where('onfront_page', 1)->get();
        // $products = Product::wherein('category_id')->groupBy('category_id');
        // dd($category->where('id', 1)->toArray()[0]['name']);
        // $products = $products->map(function($element) {
        //     $element->category_name = $this->category[$element->category_id-1]['name'];
        //     return $element;
        // });
        // $toprateds = DB::table('products')->where('rate', '>=', 3.9)->take(15)->get();
        
        return view('livewire.customer.welcome', compact(['products', 'specials']));
    }
}
