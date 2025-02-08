<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Models\Contact;
use App\Models\Owner;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $showProducts = Product::whereHas('company',fn($q)=>$q->where('companyStatus',1))
            ->where('productStatus',1)
            ->get();
        $hideProducts = Product::whereHas('company',fn($q)=>$q->where('companyStatus',0))
            ->orWhere('productStatus',0)
            ->get();
        return view('products.index',compact('showProducts','hideProducts'));
    }
    // chang product status
    public function changStatus($GTIN){
        $product = product::findOrFail($GTIN);
        $product['productStatus'] = !$product['productStatus'];
        $product->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::get();
        return view('products.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'productNameEnglish' => 'required',
            'productNameFrance' => 'required',
            'productDescriptionEnglish' => 'required',
            'productDescriptionFrance' => 'required',
            'GTIN' => 'required|numeric|digits_between:13,14|unique:products,GTIN',
            'productBrandName' => 'required',
            'productCountryOfOrigin' => 'required',
            'productGross' => 'required|numeric',
            'productNet' => 'required|numeric',
            'productUnit' => 'required',
            'companyId' => 'required',
            'productImage' => 'image|mimes:png,jpg,jpeg,svg,gif'
        ]);

        $validated['productImage'] = null;
        
        if($request->hasFile('productImage')){
            $image = $request->file('productImage');
            $imageName = $request->GTIN.'.'.$image->extension();
            $image->move(public_path('images/products/'),$imageName);
            $validated['productImage'] = $imageName;
        }
        Product::create($validated);
        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     */
        public function show(string $GTIN,Request $r)
        {
            $lang = $r->query('lang') ?? "EN";
            $product = Product::with('company')->findOrFail($GTIN);
            return view('products.show',compact('product','lang'));
        }
        public function showPublic(string $GTIN,Request $r)
        {
            $lang = $r->query('lang') ?? "EN";
            $product = Product::where('productStatus',1)->with('company')->findOrFail($GTIN);
            return view('products.show',compact('product','lang'));
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $GTIN)
    {
        $product = Product::where('GTIN',$GTIN)->firstOrFail();
        $companies = Company::all();
        return view('products.edit',compact('product','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $GTIN)
    {
        $product = Product::where('GTIN',$GTIN)->firstOrFail();
        $validated = $request->validate([
            'productNameEnglish' => 'required',
            'productNameFrance' => 'required',
            'productDescriptionEnglish' => 'required',
            'productDescriptionFrance' => 'required',
            'GTIN' => 'required|numeric|digits_between:13,14|unique:products,GTIN,'.$product->GTIN.',GTIN',
            'productBrandName' => 'required',
            'productCountryOfOrigin' => 'required',
            'productGross' => 'required|numeric',
            'productNet' => 'required|numeric',
            'productUnit' => 'required',
            'companyId' => 'required',
            'productImage' => 'image|mimes:png,jpg,jpeg,svg,gif'
        ]);
        if($request->hasFile('productImage')){
            $image = $request->file('productImage');
            $imageName = $request->GTIN.'.'.$image->extension();
            $image->move(public_path('images/products/'),$imageName);
            $validated['productImage'] = $imageName;
        }
        $product->update($validated);
        return redirect()->route('products.show',['GTIN'=>$validated['GTIN']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $GTIN)
    {
        Product::where('GTIN',$GTIN)->firstOrFail()->delete();
        return redirect()->back();
    }
    public function deleteImage($GTIN){
        $product = Product::where('GTIN',$GTIN)->firstOrFail();
        $imgName = $product->productImage;
        if(file_exists($imgName)) unlink($imgName);
        $product['productImage'] = null;
        $product->save();
        return redirect()->back();
    }

    public function GetProductsJSON(Request $r){
        $keyword = $r->query('query');
        $query = Product::query();
        if($keyword){
            $query->orWhere('productNameEnglish','like','%'.$keyword.'%')
                ->orWhere('productNameFrance','like','%'.$keyword.'%')
                ->orWhere('productDescriptionEnglish','like','%'.$keyword.'%')
                ->orWhere('productDescriptionFrance','like','%'.$keyword.'%');
        }
        $products = $query->whereHas('company',fn($q)=>$q->with(['contact','owner']))->paginate(10);
        $respond = [
            "data" => [
                $products->map(function($product){
                    return [
                        "name" => [
                            "en" => $product->productNameEnglish,
                            "fr" => $product->productNameFrance
                        ],
                        "description" => [
                            "en" => $product->productDescriptionEnglish,
                            "fr" => $product->productDescriptionFrance
                        ],
                        "gtin" => $product->GTIN, 
                        "brand" => $product->productBrandName, 
                        "countryOfOrigin" => $product->productCountryOfOrigin, 
                        "weight" => [ 
                            "gross" => $product->productGross, 
                            "net" => $product->productNet, 
                            "unit" => $product->productUnit 
                        ], 
                        "company" => [ 
                            "companyName" => ($product->company)->companyName, 
                            "companyAddress" => ($product->company)->companyAddress, 
                            "companyTelephone" => ($product->company)->companyTelephone, 
                            "companyEmail" => ($product->company)->companyEmail, 
                            "owner" => [ 
                                "name" => ($product->company->owner)->ownerName, 
                                "mobileNumber" => ($product->company->owner)->ownerNumber, 
                                "email" => ($product->company->owner)-> ownerEmail
                            ], 
                            "contact" => [ 
                                "name" => ($product->company->contact)->contactName, 
                                "mobileNumber" => ($product->company->contact)->contactNumber, 
                                "email" => ($product->company->contact)->contactEmail
                            ]
                            ]
                    ];
                })
            ],
            "pagination" => [
                "current_page" => $products->currentPage(), 
                "total_pages" => $products->lastPage(),
                "per_page" =>  $products->perPage(), 
                "next_page_url" =>  $products->nextPageUrl(),
                "prev_page_url" =>  $products->previousPageUrl()
            
            ]
            ];
            return response()->json($respond,200);
    }

    public function GetProductJSON($GTIN){
        $product = Product::whereHas('company',fn($q)=>q->with('contact','owner'))->findOrFail($GTIN);

        $respond = [
            "name" => [
                "en" => $product->productNameEnglish,
                "fr" => $product->productNameFrance
            ],
            "description" => [
                "en" => $product->productDescriptionEnglish,
                "fr" => $product->productDescriptionFrance
            ],
            "gtin" => $product->GTIN, 
            "brand" => $product->productBrandName, 
            "countryOfOrigin" => $product->productCountryOfOrigin, 
            "weight" => [ 
                "gross" => $product->productGross, 
                "net" => $product->productNet, 
                "unit" => $product->productUnit 
            ], 
            "company" => [ 
                "companyName" => ($product->company)->companyName, 
                "companyAddress" => ($product->company)->companyAddress, 
                "companyTelephone" => ($product->company)->companyTelephone, 
                "companyEmail" => ($product->company)->companyEmail, 
                "owner" => [ 
                    "name" => ($product->company->owner)->ownerName, 
                    "mobileNumber" => ($product->company->owner)->ownerNumber, 
                    "email" => ($product->company->owner)-> ownerEmail
                ], 
                "contact" => [ 
                    "name" => ($product->company->contact)->contactName, 
                    "mobileNumber" => ($product->company->contact)->contactNumber, 
                    "email" => ($product->company->contact)->contactEmail
                ]
            ]
        ];
        return response()->json($respond,200);
    }

    public function verifyGTIN(){
        return view('verifyGTIN');
    }

    public function checkGTIN(Request $r){
        $gtins = explode("\r\n",$r->GTIN);
        $validGTIN = Product::where('productStatus',1)
            ->whereIn('GTIN',$gtins)
            ->pluck('GTIN')
            ->toArray();
        $isAllValid = true;
        $result = [];
        foreach($gtins as $gtin){
            if(in_array($gtin,$validGTIN)){
                $result[] = [
                    "GTIN" => $gtin,
                    "status" => "valid"
                ];
            }else{
                $result[] = [
                    "GTIN" => $gtin,
                    "status" => "invalid"
                ];
                $isAllValid = false;
            }
        }
        return redirect()->back()->with(["result"=>$result,"isAllValid"=>$isAllValid]);
    }

}
