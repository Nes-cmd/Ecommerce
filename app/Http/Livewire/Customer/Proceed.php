<?php

namespace App\Http\Livewire\Customer;


use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Adress;
use App\Models\PaymentInstruction;
use App\Models\Order;

class Proceed extends Component
{
    use WithFileUploads;
    public $cart; 
    public $proceeded = 0;
    public $adress = [];
    public $paymentMethod;
    public $order = ['transaction_code' => null, 'transaction_photo' => null, 'contact_with' => null];
    protected $rules = [
        'adress.region' => ['required', 'string'],
        'adress.zone' => ['required', 'string'],
        'adress.street' => ['required', 'string'],
        'adress.phone' => ['required', 'numeric'],
        'adress.street_2' => ['nullable', 'string'],
        'adress.posta_number' => ['nullable', 'numeric'],
        'adress.zipcode' => ['nullable', 'numeric'],
    ];
    public function mount()
    {
        $this->cart = session()->get('cart');
        if(sizeof($this->cart) == 0){
            $this->emit('listenAlert', ['message' => 'Please something to your cart!', 'type'=> 'info', 'bg'=>'red']);
            redirect()->route('customer.welcome');
        }
        if (\Auth::guest()) {
            $adress = new Adress;
        }
        else {
            $adress = Adress::where('user_id', auth()->user()->id)->first();
            $this->order['contact_with'] = auth()->user()->email;
        } 
        $this->adress = $adress == null ? new Adress:$adress;
        
    }
    public function updated($cart)
    {   //Thi sis to protect if the user leaves the input field with out entering any thing 
        foreach($this->cart as $key => $cart){
            if(!$cart['quantity']){ //checking emptyness of the field?
                $affected = $this->cart[$key];
                $affected['quantity'] = 1;//Reverting to 1
                $this->cart->forget($key);
                $this->cart->put($key, $affected);
            }
        }
    }
    public function proceed()
    {
        $this->validate();
        $this->proceeded = 1;
        $this->setPaymentMethod(); 
    }
    public function setPaymentMethod($id = null)
    {
        if ($id == null) {
            $this->paymentMethod = PaymentInstruction::where('id', 1)->first();
        }
        else {
            $this->paymentMethod = PaymentInstruction::where('id', $id)->first();
        }
    }
    public function placeOrder()
    {
        $this->validate([
            'order.transaction_code' => ['required'],
            'order.contact_with' => ['required', 'max:50'],
            'order.transaction_photo' => ['nullable', 'mimes:jpg,png,jpeg,pdf,doc,docx']
        ]);
        if (! \Auth::guest()) {
            $this->order['user_id'] = auth()->user()->id;
        }
        $cart = session()->get('cart');
        // dd($cart);
        foreach ($cart as $key => $value) {
            $detail[$key] = $value['quantity'];
        }
        $this->order['order_detail'] = json_encode($detail);
        $this->order['adress_id'] = $this->adress->id;
        if($this->order['transaction_photo']){
            $this->order['transaction_photo'] = \Storage::put('transactionFiles',$this->order['transaction_photo']);
        }
        Order::create($this->order);
        $this->emit('listenAlert', ['message' => 'You ordered successfully. The product will be delivered soon', 'type' => 'success']);
        session()->forget('cart');
        session()->save();
        redirect()->route('customer.welcome');
    }
    public function removeCart($id)
    {
        $cart = session()->get('cart');
        $cart = $cart->forget($id);
        session()->put('cart', $cart);
        $this->cart = session()->get('cart');
        $this->emit('cartSize');
        $this->emit('listenAlert', ['message' => 'Product is removed!','type' => 'info']);
    }
    public function saveAdress()
    {
        $this->validate();
        if(! \Auth::guest()){
            $this->adress->user_id = auth()->user()->id;
        }
        $this->adress->save();
        $this->emit('listenAlert', ['message' => 'Adress saved!','type' => 'success']);
        // session()->flash('flash', 'Saved!');
    }
    public function render()
    {
        session()->put('cart', $this->cart);
        return view('livewire.customer.proceed');
    }
}