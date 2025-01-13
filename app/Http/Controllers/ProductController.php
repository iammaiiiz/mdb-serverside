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
        $showProducts = Product::join('companies as c','c.companyId','=','products.companyId')
            ->where('c.companyStatus',0)
            ->where('productStatus',0)
            ->get();
        $hideProducts = Product::join('companies as c','c.companyId','=','products.companyId')
            ->where('c.companyStatus',1)
            ->orWhere('productStatus',1)
            ->get();
        return view('products.index',compact('showProducts','hideProducts'));
    }
    public function changStatus($GTIN){
        $product = product::where('GTIN',$GTIN)->firstOrFail();
        $product['productStatus'] = !$product['productStatus'];
        $product->save();
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::select('companies.companyId as cId','companies.companyName as cName')->get();
        return view('products.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'productName' => 'required',
            'GTIN' => 'required|numeric|digits_between:13,14|unique:products,GTIN',
            'productDescription' => 'required',
            'productBrandName' => 'required',
            'productCountryOfOrigin' => 'required',
            'productGross' => 'required',
            'productNet' => 'required',
            'productUnit' => 'required',
            'companyId' => 'required',
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
    public function show(string $GTIN)
    {
        $product = Product::where('GTIN',$GTIN)->where('productStatus',0)->join('companies as c','c.companyId','=','products.companyId')->select('products.*','c.companyName')->firstOrFail();
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $GTIN)
    {
        $product = Product::where('GTIN',$GTIN)->firstOrFail();
        $companies = Company::select('companies.companyId as cId','companies.companyName as cName')->get();
        return view('products.edit',compact('product','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $GTIN)
    {
        $product = Product::where('GTIN',$GTIN)->firstOrFail();
        $validated = $request->validate([
            'productName' => 'required',
            'GTIN' => 'required|numeric|digits_between:13,14|unique:products,GTIN,'.$product->productId.',productId',
            'productDescription' => 'required',
            'productBrandName' => 'required',
            'productCountryOfOrigin' => 'required',
            'productGross' => 'numeric',
            'productNet' => 'numeric',
            'productUnit' => 'required',
            'companyId' => 'required',
        ]);
        if($request->hasFile('productImage')){
            $image = $request->file('productImage');
            $imageName = $request->GTIN.'.'.$image->extension();
            $image->move(public_path('images/products/'),$imageName);
            $validated['productImage'] = $imageName;
        }
        $product->update($validated);
        return redirect()->route('products.show',['GTIN'=>$GTIN]);
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
        $product = product::where('GTIN',$GTIN)->firstOrFail();
        // $imgName = $product->productImage;
        // if(file_exists($imageName)) unlink($imgName);
        $product['productImage'] = null;
        $product->save();
        return redirect()->back();
    }

    public function GetProductsJSON(Request $r){
        $keyword = $r->query('query');
        $query = Product::query();
        if($keyword){
            $query->where('productName','like','%'.$keyword.'%')
                ->orWhere('productDescription','like','%'.$keyword.'%');
        }
        $products = $query->join('companies as c','c.companyId','=','products.companyId')
                    ->join('contacts as ct','ct.companyId','=','products.companyId')
                    ->join('owners as o','o.companyId','=','products.companyId')
                    ->paginate(10);
        $respond = [
            "data" => [
                $products->map(function($product){
                    return [
                        "name" => $product->productName, 
                        "description" => $product->productDescription, 
                        "gtin" => $product->GTIN, 
                        "brand" => $product->productBrandName, 
                        "countryOfOrigin" => $product->productCountryOfOrigin, 
                        "weight" => [ 
                            "gross" => $product->productGross, 
                            "net" => $product->productNet, 
                            "unit" => $product->productUnit 
                        ], 
                        "company" => [ 
                            "companyName" => $product->companyName, 
                            "companyAddress" => $product->companyAddress, 
                            "companyTelephone" => $product->companyTelephone, 
                            "companyEmail" => $product->companyEmail, 
                            "owner" => [ 
                                "name" => $product->ownerName, 
                                "mobileNumber" => $product->ownerNumber, 
                                "email" => $product-> ownerEmail
                            ], 
                            "contact" => [ 
                                "name" => $product->contactName, 
                                "mobileNumber" => $product->contactNumber, 
                                "email" => $product->contactEmail
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
            return $respond;
    }

    public function GetProductJSON($GTIN){
        $product = Product::where('GTIN',$GTIN)
        ->join('companies as c','c.companyId','=','products.companyId')
        ->join('contacts as ct','ct.companyId','=','products.companyId')
        ->join('owners as o','o.companyId','=','products.companyId')
        ->firstOrFail();

        $respond = [
            "name" => $product->productName, 
            "description" => $product->productDescription, 
            "gtin" => $product->GTIN, 
            "brand" => $product->productBrandName, 
            "countryOfOrigin" => $product->productCountryOfOrigin, 
            "weight" => [ 
                "gross" => $product->productGross, 
                "net" => $product->productNet, 
                "unit" => $product->productUnit 
            ], 
            "company" => [ 
                "companyName" => $product->companyName, 
                "companyAddress" => $product->companyAddress, 
                "companyTelephone" => $product->companyTelephone, 
                "companyEmail" => $product->companyEmail, 
                "owner" => [ 
                    "name" => $product->ownerName, 
                    "mobileNumber" => $product->ownerNumber, 
                    "email" => $product-> ownerEmail
                ], 
                "contact" => [ 
                    "name" => $product->contactName, 
                    "mobileNumber" => $product->contactNumber, 
                    "email" => $product->contactEmail
                ]
            ]
        ];
        return $respond;
    }

    public function verifyGTIN(){
        return view('verifyGTIN');
    }

    public function bulkGTIN(Request $r){
        $gtins = explode("\r\n",$r->GTIN);
        $validGTIN = Product::where('productStatus',0)
            ->whereIn('GTIN',$gtins)
            ->pluck('GTIN')
            ->toArray();

        $isAllValid = true;
        $result = [
            $gtins->map(function($gtin){
                if(in_array($gtin,$validGTIN)){
                    return [
                        "gtin" => $gtin,
                        "status" => "Valid"
                    ];
                }else{
                    $isAllValid = false;
                    return [
                        "gtin" => $gtin,
                        "status" => "Invalid"
                    ];
                }
            })
        ];
        return redirect()
            ->back()
            ->with([
                "isAllValid" => $isAllValid,
                "result" => $result
            ]);
    }

}
