<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Category;
use App\Models\City;
use App\Models\Product;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Banner;

class ManageController extends Controller
{

    public function AdminAllProduct(){
        $product = Product::orderBy('id','DESC')->get();
        return view('admin.backend.product.all_product',compact('product'));

    } // End Method


    public function AdminAddProduct(){
        $category = Category::latest()->get();
        $city = City::latest()->get();
        $menu = Menu::latest()->get();
        $client = Client::latest()->get();
        return view('admin.backend.product.add_product',compact('category','city','menu','client'));

    } // End Method


    public function AdminStoreProduct(Request $request){

        $pcode = IdGenerator::generate(['table' => 'products','field' => 'code', 'length' => 8, 'prefix' => 'PC']);

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300,300)->save(public_path('upload/product/'.$name_gen));
            $save_url = 'upload/product/'.$name_gen;

            Product::create([
                'category_id' => $request->category_id,
                'menu_id' => $request->menu_id,
                'city_id' => $request->city_id,
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ','-',$request->name)),
                'code' => $pcode,
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'size' => $request->size,
                'qty' => $request->qty,
                'best_seller' => $request->best_seller,
                'most_popular' => $request->most_popular,
                'client_id' => $request->client_id,
                'image' => $save_url,
                'status' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.all.product')->with($notification);

    } // End Method


    public function AdminEditProduct($id){
        $category = Category::latest()->get();
        $city = City::latest()->get();
        $menu = Menu::latest()->get();
        $client = Client::latest()->get();
        $product = Product::find($id);
        return view('admin.backend.product.edit_product',compact('category','city','menu','product','client'));

    } // End Method



    public function AdminUpdateProduct(Request $request){

        $pro_id = $request->id;
        $old_img = $request->old_img;

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(300,300)->save(public_path('upload/product/'.$name_gen));
            $save_url = 'upload/product/'.$name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Product::find($pro_id)->update([
                'category_id' => $request->category_id,
                'menu_id' => $request->menu_id,
                'city_id' => $request->city_id,
                'client_id' => $request->client_id,
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ','-',$request->name)),
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'size' => $request->size,
                'qty' => $request->qty,
                'best_seller' => $request->best_seller,
                'most_popular' => $request->most_popular,
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.all.product')->with($notification);
        }else{
            Product::find($pro_id)->update([
                'category_id' => $request->category_id,
                'menu_id' => $request->menu_id,
                'city_id' => $request->city_id,
                'client_id' => $request->client_id,
                'name' => $request->name,
                'slug' => strtolower(str_replace(' ','-',$request->name)),
                'price' => $request->price,
                'discount_price' => $request->discount_price,
                'size' => $request->size,
                'qty' => $request->qty,
                'best_seller' => $request->best_seller,
                'most_popular' => $request->most_popular,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Product Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.all.product')->with($notification);
        }


    } // End Method


    public function AdminDeleteProduct($id){

        $item = Product::find($id);
        $img = $item->image;
        unlink($img);

        Product::find($id)->delete();

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method




    public function AdminChangeStatus(Request $request){

        $product = Product::find($request->product_id);
        $product->status = $request->status;
        $product->save();

        return response()->json(['success' => 'Status Change Success']);

    } // End Method




    ///////////////////////////// All Pending and Approved Restraurant /////////////////////////////////

    public function PendingRestraurant(){

        $client = Client::where('status',0)->get();
        return view('admin.backend.restraurant.pending_restraurant',compact('client'));

    } // End Method


    public function ClientChangeStatus(Request $request){

        $client = Client::find($request->client_id);
        $client->status = $request->status;
        $client->save();

        return response()->json(['success' => 'Status Change Success']);

    } // End Method


    public function ApproveRestraurant(){

        $client = Client::where('status',1)->get();
        return view('admin.backend.restraurant.approve_restraurant',compact('client'));

    } // End Method


    /////////////////////////////////// Admin Banner Method ///////////////////////////////

    public function AllBanner(){

        $banner = Banner::latest()->get();
        return view('admin.backend.banner.all_banner',compact('banner'));

    } // End Method


    public function StoreBanner(Request $request){

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(400,400)->save(public_path('upload/banner/'.$name_gen));
            $save_url = 'upload/banner/'.$name_gen;

            Banner::create([
                'url' => $request->url,
                'image' => $save_url,
            ]);
        }

        $notification = array(
            'message' => 'Banner Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // End Method


    public function EditBanner($id){

        $banner = Banner::find($id);

        if ($banner) {
            $banner->image = asset($banner->image);
        }

        return response()->json($banner);

    } // End Method


    public function UpdateBanner(Request $request){

        $banner_id = $request->banner_id;

        if ($request->file('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(400,400)->save(public_path('upload/banner/'.$name_gen));
            $save_url = 'upload/banner/'.$name_gen;

            Banner::find($banner_id)->update([
                'url' => $request->url,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Banner Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.banner')->with($notification);

        }else{
            Banner::find($banner_id)->update([
                'url' => $request->url,
            ]);

            $notification = array(
                'message' => 'Banner Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.banner')->with($notification);
        }


    } // End Method



    public function DeleteBanner($id){

        $item = Banner::find($id);
        $img = $item->image;
        unlink($img);

        Banner::find($id)->delete();

        $notification = array(
            'message' => 'Banner Delete Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method





} // End Main Method
