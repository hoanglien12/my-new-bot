<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\DogCategory; 
use App\Models\ProductCategory;
use App\Models\Product; 
use App\Models\Cart;  
use App\Models\Post;
use App\Models\SiteConfig;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Order;
use App\Models\DetailOrder;
use App\Http\Requests\OrderRequest;


class CartController extends Controller
{
    public function __construct()
    {
        $this->order = new Order();
        $this->detailOrder = new DetailOrder();
    }

    public function addDogToCart(Request $req,$id){
        if(Auth::check()){
            
            $dog_add             = Dog::find($id); 
            $oldCart             = Session('cart')?Session::get('cart'):null;
            $cart                = new Cart($oldCart);     
            $cart->add($dog_add, $dog_add->name);
            $req->session()->put('cart',$cart);
            // dd($cart->add($dog_add, $dog_add->name));

            return redirect()->back();       
        }
        else{
            return redirect()->route('login');
        }
          
    } 

     public function addProductToCart(Request $req,$id){
        if(Auth::check())
        {
            $product_add         = Product::find($id);
            $oldCart             = Session('cart') ? Session::get('cart'):null;
            $cart                = new Cart($oldCart);                   
            $cart->add($product_add,$product_add->name);
            //dd($cart);            
            $req->session()->put('cart',$cart);

            return redirect()->back();  
        }   
        else{
            return redirect()->route('login');
        }       
               
    } 
    public function reduceOne($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }

    public function removeItem($id)
    {
        $old = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($old);
        $cart->removeItem($id);
        if(count($cart->items) > 0)
        {
            Session::put('cart',$cart);
        }
        else
        {
            Session::forget('cart');
        }
        
        return redirect()->back();
    }

    public function viewCart(){
        $product_add = Product::all();
        $dog_add = Dog::all();
        $site_phone          = SiteConfig::where('label','site_phone')->get();
        $site_address        = SiteConfig::where('label','site_address')->get();
        $dogCategories       = DogCategory::all();
        $productCategories   = ProductCategory::all();
        if(!Session::has('cart')){
            return view('client.cart.viewcart',['product_add'=>null, 'dog_add' =>null],compact('site_phone','site_address','dogCategories','productCategories'));

        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        return view ('client.cart.viewcart',['dog_add'=> $cart->items,'product_add' =>$cart->items,
            'totalPrice'=>$cart->totalPrice],compact('site_phone','site_address','dogCategories','productCategories'));

    }

    public function deleteAll(Request $request)
    {
        $request->session()->forget('cart');

        return redirect()->back();
    }
    
    public function getCheckout(){
        if(Session::has('cart'))
        {
            $cart = new Cart(Session::get('cart'));
            $site_phone          = SiteConfig::where('label','site_phone')->get();
            $site_address        = SiteConfig::where('label','site_address')->get();
            $dogCategories       = DogCategory::all();
            $productCategories   = ProductCategory::all();

            return view('client.cart.checkout', ['totalPrice' => $cart->totalPrice],compact('dogCategories','productCategories','site_address','site_phone'));
        }
        else{
            return redirect()->back()->with('error', 'Ban chua co san pham trong gio hang');
        }
        
    }
    public function order(OrderRequest $request)
    {
        $cart = Session::get('cart');

        $att = array(
            'id_user' => Auth::user()->id,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'other_address' => $request->other_address,
            'note' => $request->description,
            'address' => $request->address,
            'status' => 1,
            'total' => $request->total,
            'shipping' => $request->payment,
            'date' => date('Y-m-d'),
        );
        $order = $this->order->create($att);

        foreach($cart->items as $key => $value)
        {
            if (isset($value['item']['id_dog_cate'])) {
                $data = array(
                    'id_order' => $order->id,
                    'id_dog' => $value['item']['id'],
                    'price' => $value['price'],
                    'quantity' => $value['qty'],
                    'amount' => $value['price']*$value['qty'],
                );
            }
            else if(isset($value['item']['id_product_cate']))
            {
                $data = array(
                    'id_order' => $order->id,
                    'id_product' => $value['item']['id'],
                    'price' => $value['price'],
                    'quantity' => $value['qty'],
                    'amount' => $value['price']*$value['qty'],
                );
            }
            

            $this->detailOrder->create($data);
        }
        Session::forget('cart');

        return redirect()->route('home.viewcart')->with('success', 'Order successful!');
    }
}
