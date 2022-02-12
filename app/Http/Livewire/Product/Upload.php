<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Product;
use Intervention\Image\ImageManagerStatic as Image;
class Upload extends Component
{
    use WithFileUploads;
    public $newCategory;
    
    public $name;
    public $category_id;
    public $price;
    public $manufacturer;
    public $photo_url;
    public $description;
    public $operation;
  
    public function addCategory()
    {
        Category::create(['category_name' => $this->newCategory, 'created_by' => \Auth::user()->id]);
        $this->newCategory = '';
        // session()->flash('success', 'Categroy added successfilly');
        $this->emit('listenAlert', ['message' => 'Categroy added successfully.', 'type' => 'success']);
    }
    public function addProduct()
    {
        $validated = $this->validate([
            'name' => ['required', 'max:60'],
            'price' => ['required', 'numeric'],
            'photo_url' => ['required', 'image', 'mimes:jpg,jpeg,gif,png,bmp,webp'],
            'description' => ['sometimes', 'max:65535'],
            'operation' => ['sometimes', 'max:65535'],
            'category_id' => ['required']
        ]);
        
        // $photo = \Storage::put('public/products', $this->photo_url); 
        $image = Image::make($this->photo_url)->resize(400,300);
        $name = 'products/'.$this->photo_url->hashName();
        $image->save('storage/'.$name, 75, 'jpeg');
        
        $validated['posted_by'] = auth()->user()->id;
        $validated['photo_url'] =  json_encode(['photo_1' => $name]);
        Product::create($validated);
        $this->emit('listenAlert', ['message' => 'Product uploaded successfully.', 'type' => 'success']);
        $this->name = null;
        $this->category_id = null;
        $this->price = null;
        $this->manufacturer = null;
        $this->photo_url = null;
        $this->description = null;
        $this->operation = null;
        
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.product.upload', compact('categories'));
    }
}
