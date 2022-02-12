<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use DB;

class Edit extends Component
{
    use WithFileUploads;

    public $product;
    public $photo = [];
    public $images = [];
    public $color = [];
    public function mount($id) 
    {
        $product = DB::table('products')->where('id', $id)->first();
        $this->product = (array)$product;
        $this->photo = collect((array) json_decode($product->photo_url));
        $this->color = (array) json_decode($product->color);
    }
    public function save()
    {
        $id = $this->product['id'];
        $order = DB::table('orders')
                        ->whereJsonLength("order_detail->$id", ">", 0)
                        ->first();
        if ($order != null) {
            $this->emit('listenAlert', ['message' => 'The product is ordered by customer, process it first!', 'type' => 'info' , 'bg'=>'red']);
            return;
        }
        $valid = $this->validate([
            'product.name' => ['required', 'string'],
            'product.price' => ['required', 'numeric', 'min:0'],
            'product.description' => ['required', 'string'],
            'product.operation' => ['sometimes', 'string'],
            'product.status' => ['required'],
            'images.*' => ['nullable','file','mimes:png,jpg,jpeg,webp'],
        ]);
        if($this->images){$this->updateImages();}
        $this->product['color'] = json_encode($this->color);
        $product = Product::where('id', $this->product['id'])->update($this->product);
        $this->emit('listenAlert', ['message' => 'Product updated succesfully!', 'type' => 'success' , 'bg'=>'green']);
    }
    public function updateImages()
    {
        if(isset($this->images[0])){
            $photo = \Storage::put('public/products', $this->images[0]);
            $this->photo['photo_1'] = substr($photo, 7);
        }
        if(isset($this->images[1])){
            $photo = \Storage::put('public/products', $this->images[1]);
            $this->photo['photo_2'] = substr($photo, 7);
        }
        if(isset($this->images[2])){
            $photo = \Storage::put('public/products', $this->images[2]);
            $this->photo['photo_3'] = substr($photo, 7);
        }
        $this->product['photo_url'] = json_encode($this->photo);
    }
    public function deletePhoto($key)
    {
        if($key == 'photo_1'){
            $this->emit('listenAlert', ['message' => 'The first photo cannot be deleted, change it if you want!', 'type' => 'info' , 'bg'=>'red']);
             return;
            }
        $this->photo->forget($key);
        $this->product['photo_url'] = json_encode($this->photo);
        $product = Product::where('id', $this->product['id'])->update($this->product);  
        $this->emit('listenAlert', ['message' => 'Product photo has been deleted!', 'type' => 'info', 'bg'=>'green']);
    }
    public function render()
    {
        return view('livewire.product.edit');
    }
}
