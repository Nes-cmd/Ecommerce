<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;
use App\Models\Category as Cat;

class Category extends Component
{
    public $new_category;
    public $categories;
    public function mount()
    {
        $this->categories = Cat::get()->toArray();
    }
    public function addCategory()
    {
        Cat::create(['category_name' => $this->new_category, 'created_by' => auth()->user()->id]);
        $this->new_category = null;
        $this->emit('listenAlert', ['message' => 'Categroy added successfilly.', 'type' => 'success']);
    }
    public function saveCategory($id)
    {
        Cat::where('id', $id)->update([
            'category_name' => $this->categories[$id-1]['category_name'],
            'onfront_page' => $this->categories[$id-1]['onfront_page']
        ]);
        $this->emit('listenAlert', ['message' => 'Saved!', 'type' => 'success']);
    }
    public function render()
    {
        return view('livewire.product.category');
    }
}
