<?php

namespace App\Http\Controllers\Client;

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
use App\Models\Gallery;

class ProductController extends Controller
{

    public function AllProduct(){
        $id = Auth::guard('client')->id();
        $product = Product::where('client_id',$id)->orderBy('id','DESC')->get();
        return view('client.backend.product.all_product',compact('product'));

    } // End Method


    public function AddProduct(){
        $id = Auth::guard('client')->id();
        $category = Category::latest()->get();
        $city = City::latest()->get();
        $menu = Menu::where('client_id',$id)->latest()->get();
        return view('client.backend.product.add_product',compact('category','city','menu'));

    } // End Method


    public function StoreProduct(Request $request){

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
                'client_id' => Auth::guard('client')->id(),
                'image' => $save_url,
                'status' => 1,
                'created_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.product')->with($notification);

    } // End Method


    public function EditProduct($id){
        $cid = Auth::guard('client')->id();
        $category = Category::latest()->get();
        $city = City::latest()->get();
        $menu = Menu::where('client_id',$cid)->latest()->get();
        $product = Product::find($id);
        return view('client.backend.product.edit_product',compact('category','city','menu','product'));

    } // End Method


    public function UpdateProduct(Request $request){

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

            return redirect()->route('all.product')->with($notification);
        }else{
            Product::find($pro_id)->update([
                'category_id' => $request->category_id,
                'menu_id' => $request->menu_id,
                'city_id' => $request->city_id,
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

            return redirect()->route('all.product')->with($notification);
        }


    } // End Method


    public function DeleteProduct($id){

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


    public function ChangeStatus(Request $request){

        $product = Product::find($request->product_id);
        $product->status = $request->status;
        $product->save();

        return response()->json(['success' => 'Status Change Success']);

    } // End Method


    ////////////////////////////////// Restrurant Gallery ////////////////////////////////////

    public function AllGallery(){
        $cid = Auth::guard('client')->id();
        $gallery = Gallery::where('client_id',$cid)->latest()->get();
        return view('client.backend.gallery.all_gallery',compact('gallery'));

    } // End Method


    public function AddGallery(){

        return view('client.backend.gallery.add_gallery');

    } // End Method


    public function StoreGallery(Request $request){

        $images = $request->file('image');

        foreach ($images as $gimg) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$gimg->getClientOriginalExtension();
            $img = $manager->read($gimg);
            $img->resize(800,800)->save(public_path('upload/gallery/'.$name_gen));
            $save_url = 'upload/gallery/'.$name_gen;

            Gallery::insert([
                'client_id' => Auth::guard('client')->id(),
                'image' => $save_url,
            ]);
        }

        $notification = array(
            'message' => 'Gallery Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.gallery')->with($notification);

    } // End Method


    public function EditGallery($id){

        $gallery = Gallery::find($id);
        return view('client.backend.gallery.edit_gallery',compact('gallery'));

    } // End Method


    public function UpdateGallery(Request $request){

        $gallery_id = $request->id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img->resize(800,800)->save(public_path('upload/gallery/'.$name_gen));
            $save_url = 'upload/gallery/'.$name_gen;

            $gallery = Gallery::find($gallery_id );
            if ($gallery->image) {
                $img = $gallery->image;
                unlink($img);
            }

            $gallery->update([
                'image' => $save_url,
            ]);


            $notification = array(
                'message' => 'Gallery Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.gallery')->with($notification);

        }else{

            $notification = array(
                'message' => 'No Image Selected for Update',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
        }


    } // End Method


    public function DeleteGallery($id){

        $item = Gallery::find($id);
        $img = $item->image;
        unlink($img);

        Gallery::find($id)->delete();

        $notification = array(
            'message' => 'Gallery Image Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End Method







} // End Main Method
