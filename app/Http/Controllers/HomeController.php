<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Messages;
use App\Models\News;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use App\Models\WebsiteData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Square\Environment;
use Square\Models\CreatePaymentRequest;
use Square\Models\Money;
use Square\SquareClient;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('created_at', 'desc')->take(3)->get();
        $bestSellers = Product::where('type', 'popular')->orderBy('created_at', 'desc')->take(6)->get();
        $set = WebsiteData::first(['about_head', 'about_p1', 'about_p2']);
        $categories = Category::with(['products' => function ($query) {
            $query->limit(6);  
        }])->take(3)->get();
        
        return view('index', compact('sliders', 'bestSellers', 'categories', 'set'));
    }


    public function about() {
        $about = About::first();
        return view('about', compact('about'));
    }


    public function contact() {
        return view('contact');
    }


    public function shop(Request $request) {
        if ($request->get('from') != null) {
            $from = number_format((float)$request->get('from') ,2, '.', '');
            $to = number_format((float)$request->get('to'),2, '.', '');
            $products = Product::whereBetween('price', [$from, $to])->paginate(9);
        }
        elseif ($request->get('cat') != null) {
            $products = Product::where('category_id', $request->get('cat'))->paginate(9);
        }
         else {
            $products = Product::paginate(9);
        }
        
        $cats = Category::all();
        return view('shop', compact('products', 'cats'));
    }
    public function SendMessage(Request $request) {
        $vlidation = $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $requestData = $request->except('_token');
        Messages::create($requestData);
        return redirect()->route('home')->with('success', 'Message Send Successfully');

    }

    ///ADD TO CART
    public function AddToCart($id) {
        $requestData['product_id'] = $id;
        $requestData['session_id'] = auth()->user()?->id ?? Session::getId();
        $check = Cart::where('session_id', $requestData['session_id'])->where('product_id', $id)->first();
        if ($check== null) {
            Cart::create($requestData);
        } else {
            $newcount = $check->count +1 ;
            $check->update([
                'count' => $newcount
            ]);
        }
        return redirect()->back();
    }
    public function deleteCart($id) {
        $cart = Cart::findOrFail($id);
        $cart->delete();
        return redirect()->back();
    }
    public function cart() {
        if(isset(auth()->user()->id)) {
            $carts = Cart::where('session_id', auth()->user()->id)->get();
        }
        else {
            $carts = Cart::where('session_id', Session::getId())->get();
        }

        return view('cart', compact('carts'));
    }



    public function cartPlus($id) {
        $cart = Cart::where('product_id',$id)->first();
        $newcount = $cart->count +1 ;
        $cart->update([
            'count' => $newcount
        ]);
        return redirect()->back();
    }



    public function cartMin($id) {
        $cart = Cart::where('product_id',$id)->first();
        if ($cart->count == 1) {
            $cart->delete();
        } else {
            $newcount = $cart->count -1 ;
            $cart->update([
                'count' => $newcount
            ]);
        }
        
        return redirect()->back();
    }



    public function checkout(Request $request) {

        
        $requestData = $request->except('_token');
        $user = User::findOrFail(auth()->user()->id);
        // $user->update([
        //     'address' => $request->address,
        //     'street' => $request->street,
        // ]);

        Order::create([
            'user_id' => auth()->user()->id,
            'details' => $request->details,
            'address' => $user->address ?? "--",
            'street' => $user->street ?? "--",
        ]);

        $datas = Cart::where('session_id', auth()->user()->id)->get();

        foreach($datas as $data) {

            $data->delete();
            
        }
        return redirect()->route('home');

    }


    public function shop_single($id) {
        $product = Product::findOrFail($id);
        return view('shop_single', compact('product'));
    }


    public function post($id) {
        $product = Product::findOrFail($id);
        return view('single-post', compact('product'));
    }


    public function menu() {
        $categories = Category::with('products')->get();
        return view('products', compact('categories'));
    }


    public function location() {
        return view('location');
    }


    public function contacts() {
        $con = WebsiteData::first();

        return view('contacts', compact('con'));
    }



    public function menuSearch(Request $request) {
        if(isset($request->search) && $request->search != NULL ) {
            $products = Product::where('name', 'like', '%' . $request->search . '%')->get();
            return view('products', compact('products'));
        }
    }



    public function categories() {
        $cats = Category::with('products')->get();
        return view('categories', compact('cats'));
    }



    public function category($id) {

        $products = Product::where('category_id', $id)->get();
        
        return view('products', compact('products'));

    }


    public function createPayment()
    {
 
        $accessToken = 'EAAAEUJzq0koyO_QQQkwsA3n_u1O9pOxHC8nv_-aacw-R9mP859_cRyZOGLptlFe';
        $locationId = 'LYQ78M8HRC23X';
        $uniqueKey = '4290335e-6ee0-429a-94b5-69689d23eaf7';
        
        $data = [
            "idempotency_key" => $uniqueKey,
            "quick_pay" => [
                "name" => "Auto Detailing",
                "price_money" => [
                    "amount" => 12500,
                    "currency" => "USD"
                ],
                "location_id" => $locationId,
                "redirect_url" => 'https://Qahwah Valley.asrixx.com/'
            ]
        ];
        
        $headers = [
            'Square-Version: 2023-11-15',
            'Authorization: Bearer ' . $accessToken,
            'Content-Type: application/json',
        ];
        
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'https://connect.squareupsandbox.com/v2/online-checkout/payment-links');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }
        
        curl_close($ch);
        if($response) {
            // dd($response);
            $responseData = json_decode($response, true);
            // Output the response
            return redirect()->to($responseData['payment_link']['long_url']);
        }
    
    }



    //
    public function myOrders() {

        $orders = Order::where('user_id', auth()->user()->id)->get();
        
        return view('orders', compact('orders'));
    }



    private function formatJson($data)
    {
        if (is_array($data) || is_object($data)) {
            return json_encode($data, JSON_PRETTY_PRINT);
        } else {
            return $data;
        }
    }

//     public function paymentCard(Request $request)
//     {
//         try {
//             $data = $request->all();
//             if (!isset($data['amount']) || !isset($data['sourceId']['token'])) {
//                 return response()->json(['error' => 'Invalid payment data provided.'], 400);
//             }

//             $square_client = new SquareClient([
//                 'accessToken' => 'EAAAEBaBLEZJxHQVYtZhuwN4jvi3a0meJpBkccotpiERnbU9ZkMt2o7wZqg46ZjL',
//                 'environment' => Environment::PRODUCTION,
//             ]);

//             $grandTotal = (int) $data['amount'];

//             $payments_api = $square_client->getPaymentsApi();
//             $money = new Money();
//             $money->setAmount($grandTotal);
//             $money->setCurrency("USD");
//             $orderId = uniqid();

//             $sourceIdToken = $data['sourceId']['token'];
//             $create_payment_request = new CreatePaymentRequest($sourceIdToken, $orderId);
//             $create_payment_request->setAmountMoney($money);

//             $response = $payments_api->createPayment($create_payment_request);

//             if ($response->isSuccess()) {
//                 return response()->json($response->getResult());
//              } else {
//                 \Log::error('Square API Errors: ' . json_encode($response->getErrors(), JSON_PRETTY_PRINT));
//                 return response()->json(['error' => 'An error occurred while processing the payment.'], 500);
//             }
//         } catch (\Exception $e) {
//             \Log::error('Unexpected error: ' . $e->getMessage());
//             return response()->json(['error' => 'An error occurred while processing the payment.'], 500);
//         }
//     }
}
