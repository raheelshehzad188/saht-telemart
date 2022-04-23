<?php

namespace App\Http\Controllers\Admins;

use App\Models\Admins\Category;
use App\Models\Admins\Blog_Post;
use App\Models\Admins\Slider;
use App\Models\Admins\Brand;
use App\Models\Admins\SubCategory;
use App\Models\Admins\Blog_Category;
use App\Models\Admins\Product;
use App\Models\Admins\Coupon;
use App\Models\Newsletter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admins.dashboard');
    }
    public function category(Request $request,$id=0,$delete=null){
        $edit=null;
        if(isset($delete) && $id>0){
            Category::find($id)->delete();
            return redirect(route('admins.category'))->with([
                'msg'=>'Category Deleted Successfully',
                'msg_type'=>'success',
            ]);
        }
        if($id>0 && !isset($delete)){
            $edit=Category::find($id);
        }
        if ($request->isMethod('post')) {

            $request->validate([
                'name'=>'required|unique:categories,name,'.$request->hidden_id,
            ]);

            if($request->has('hidden_id')){
                $category=Category::find($request->hidden_id);
            }else{
                $category=new Category();
                $category->created_at=Date('Y-m-d h:i:s');
            }
            $category->name=$request->name;
            $category->updated_at=Date('Y-m-d h:i:s');
            $category->save();
            return redirect(route('admins.category'))->with([
                'msg'=>'Category Saved Successfully',
                'msg_type'=>'success',
            ]);
        }
        $categories=Category::all();
        return view('admins.category',compact('categories','edit'));
    }
    public function brand(Request $request,$id=0,$delete=null){
        $edit=null;
        $path=null;
        if(isset($delete) && $id>0){
            $brand=Brand::find($id);
            $file_path=public_path().'/'.$brand->brand_logo;
            if(\File::exists($file_path)){
                \File::delete(public_path().'/'.$brand->brand_logo);
            }           
            $brand->delete();
            return redirect(route('admins.brand'))->with([
                'msg'=>'Brand Deleted Successfully',
                'msg_type'=>'success',
            ]);
        }
        if($id>0 && !isset($delete)){
            $edit=Brand::find($id);
        }
        if ($request->isMethod('post')) {

            $request->validate([
                'name'=>'required|unique:brands,name,'.$request->hidden_id,
                'logo' => 'required|mimes:png,jpg,jpeg,gif'
            ]);


            if($request->has('hidden_id')){
                $brand=Brand::find($request->hidden_id);

                $brand->brand_logo=$brand->brand_logo;
            }else{
                $brand=new Brand();
                $brand->created_at=Date('Y-m-d h:i:s');
            }
            if($request->logo){

                if($request->has('previous_logo')){
                    $file_path=public_path().'/'.$request->previous_logo;
                    if(\File::exists($file_path)){
                        \File::delete($file_path);
                    } 
                }

                $imageName = hexdec(uniqid()).'.'. $request->logo->extension();  
                $path='images/brands/'.$imageName;
                $request->logo->move(public_path('images/brands'), $imageName);
                $brand->brand_logo=$path;

            }
            $brand->name=$request->name;
            $brand->updated_at=Date('Y-m-d h:i:s');
            $brand->save();
            return redirect(route('admins.brand'))->with([
                'msg'=>'Brand Saved Successfully',
                'msg_type'=>'success',
            ]);
        }
        $brands=Brand::all();
        return view('admins.brand',compact('brands','edit'));
    }
    public function subcategory(Request $request,$id=0,$delete=null)
    {
        $edit=null;
        if(isset($delete) && $id>0){
            SubCategory::find($id)->delete();
            return redirect(route('admins.subcategory'))->with([
                'msg'=>'SubCategory Deleted Successfully',
                'msg_type'=>'success',
            ]);
        }
        if($id>0 && !isset($delete)){
            $edit=SubCategory::find($id);
        }
        if ($request->isMethod('post')) {

            $request->validate([
                'name'=>'required|unique:sub_categories,name,' . $request->hidden_id,
                'category_id'=>'required',
            ],['category_id.required'=> 'Category Must be Required']);

            $request->validate([
                'name'=>'required',
                'category_id'=>'required',
            ]);

            if($request->has('hidden_id')){
                $category=SubCategory::find($request->hidden_id);
            }else{
                $category=new SubCategory();
                $category->created_at=Date('Y-m-d h:i:s');
            }
            $category->name=$request->name;
            $category->category_id=$request->category_id;
            $category->updated_at=Date('Y-m-d h:i:s');
            $category->save();
            return redirect(route('admins.subcategory'))->with([
                'msg'=>'SubCategory Saved Successfully',
                'msg_type'=>'success',
            ]);
        }
        $categories=Category::all();
        $sub_categories=$users = SubCategory::leftJoin('categories', 'categories.id', '=', 'sub_categories.category_id')
        ->select('sub_categories.*', 'categories.name AS parent_category')
        ->get();
        return view('admins.subcategory',compact('categories','sub_categories','edit'));
    }
    public function news_letters(Request $request,$id=0,$delete=null)
    {
        if(isset($delete) && $id>0){
            Newsletter::find($id)->delete();
            return redirect(route('admins.news_letters'))->with([
                'msg'=>'Subcriber Deleted Successfully',
                'msg_type'=>'success',
            ]);
        }
        $news_letters=Newsletter::get();
        return view('admins.news_letters',compact('news_letters'));
    }
    public function coupon(Request $request,$id=0,$delete=null){
        $edit=null;
        if(isset($delete) && $id>0){
            Coupon::find($id)->delete();
            return redirect(route('admins.coupon'))->with([
                'msg'=>'Coupon Deleted Successfully',
                'msg_type'=>'success',
            ]);
        }
        if($id>0 && !isset($delete)){
            $edit=Coupon::find($id);
        }
        if ($request->isMethod('post')) {

            $request->validate([
                'code'=>'required|unique:coupons,code,'.$request->hidden_id,
                'discount'=>'required',
            ]);

            if($request->has('hidden_id')){
                $coupon=Coupon::find($request->hidden_id);
            }else{
                $coupon=new Coupon();
                $coupon->created_at=Date('Y-m-d h:i:s');
            }
            $coupon->code=$request->code;
            $coupon->discount=$request->discount;
            $coupon->updated_at=Date('Y-m-d h:i:s');
            $coupon->save();
            return redirect(route('admins.coupon'))->with([
                'msg'=>'Coupon Saved Successfully',
                'msg_type'=>'success',
            ]);
        }
        $coupons=Coupon::all();
        return view('admins.coupons',compact('coupons','edit'));
    }
    public function products(Request $request,$id=0,$delete=null){
        $products=Product::select('products.*','categories.name AS category_name','brands.name AS brand_name')->join('categories','categories.id','products.category_id')->join('brands','brands.id','products.brand_id')->orderBy('products.id','DESC')->get();
        return view('admins.products',compact('products'));
    }
    public function product_form(Request $request,$id=0)
    {
        $edit=null;
        if ($request->isMethod('post')){
            if($request->hidden_id){
                $product=Product::find($request->hidden_id);
            }else{
                $product=new Product();
            }
            $product->category_id=$request->category_id;
            $product->subcategory_id=$request->subcategory_id;
            $product->brand_id=$request->brand_id;
            $product->product_name=$request->product_name;
            $product->product_code=$request->product_code;
            $product->product_quantity=$request->product_quantity;
            $product->product_details=$request->product_details;
            $product->product_color=$request->product_color;
            $product->product_size=$request->product_size;
            $product->selling_price=$request->selling_price;
            $product->video_link=$request->video_link;
            $product->main_slider=isset($request->main_slider) ? 1 : 0;
            $product->hot_deal=isset($request->hot_deal) ? 1 : 0;
            $product->best_rated=isset($request->best_rated) ? 1 : 0;
            $product->mid_slider=isset($request->mid_slider) ? 1 : 0;
            $product->hot_new=isset($request->hot_new) ? 1 : 0;
            $product->trend=isset($request->trend) ? 1 : 0;
            $product->status=1;
            $product->video_link=$request->video_link;
                if($request->image_one){
                    if($request->hidden_id){
                        $img_one=public_path().'/'.$product->image_one;
                        if(\File::exists($img_one)){
                            \File::delete($img_one);
                        } 
                    }
                $img_one_name=hexdec(uniqid()).'.'.$request->image_one->getClientOriginalExtension();
                $image_one_path='/images/products/'.$img_one_name;
                \Image::make($request->image_one)->resize(300, 300)->save(public_path().'/images/products/'.$img_one_name);
                $product->image_one=$image_one_path;
            }
            if($request->image_two)
            {
                if($request->hidden_id){
                    $img_two=public_path().'/'.$product->image_two;
                    if(\File::exists($img_two)){
                        \File::delete($img_two);
                    } 
                }
                $img_two_name=hexdec(uniqid()).'.'.$request->image_two->getClientOriginalExtension();
                $image_two_path='/images/products/'.$img_two_name;
                \Image::make($request->image_two)->resize(300, 300)->save(public_path().'/images/products/'.$img_two_name);
                $product->image_two=$image_two_path;
            }
            if($request->image_three)
            {
                if($request->hidden_id){
                    $img_three=public_path().'/'.$product->image_three;
                    if(\File::exists($img_three)){
                        \File::delete($img_three);
                    } 
                }
                $img_three_name=hexdec(uniqid()).'.'.$request->image_three->getClientOriginalExtension();
                $image_three_path='/images/products/'.$img_three_name;
                \Image::make($request->image_three)->resize(300, 300)->save(public_path().'/images/products/'.$img_three_name);
                $product->image_three=$image_three_path;
            }
            $product->save();
            return redirect(route('admins.products'))->with([
                'msg'=>'Product Saved Successfully',
                'msg_type'=>'success',
            ]);
        }
        $categories=Category::all();
        $brands=Brand::all();
        if($id>0)
        $edit=Product::findorFail($id);
        return view('admins.product_form',compact('categories','brands','edit'));
    }
    public function get_subCategory_html(Request $request)
    {
        $options="";
        $sub_categories=SubCategory::where('category_id',$request->category_id)->get();
        $sub_cat_id=$request->sub_category_id;
        if(count($sub_categories)>0){
            foreach($sub_categories as $sub_category)
            {
                $selected=$sub_cat_id>0 && $sub_category->id==$sub_cat_id ? "selected" : null;
                $options.='<option '.$selected.' value="'.$sub_category->id.'">'.$sub_category->name.'</option>';
            }
        }
        echo $options;
    }
    public function product_delete($id)
    {
        $product=Product::find($id);
        $img_one=public_path().'/'.$product->image_one;
        if(\File::exists($img_one)){
            \File::delete($img_one);
        } 
        $img_two=public_path().'/'.$product->image_two;
        if(\File::exists($img_two)){
            \File::delete($img_two);
        } 
        $img_three=public_path().'/'.$product->image_three;
        if(\File::exists($img_three)){
            \File::delete($img_three);
        } 
        $product->delete();
        return redirect(route('admins.products'))->with([
            'msg'=>'Product Deleted Successfully',
            'msg_type'=>'success',
        ]);
    }
    public function update_product_status(Request $request)
    {
        $product=Product::find($request->product_id);
        $product->status=$request->Status;
        $product->save();
        return response()->json([
            'msg'=>'Product Status Updated',
            'msg_type'=>'success',
        ]);
    }
    public function blog_category(Request $request,$id=0,$delete=null){
        $edit=null;
        if(isset($delete) && $id>0){
            Blog_Category::find($id)->delete();
            return redirect(route('admins.blog_category'))->with([
                'msg'=>'Blog Category Deleted Successfully',
                'msg_type'=>'success',
            ]);
        }
        if($id>0 && !isset($delete)){
            $edit=Blog_Category::find($id);
        }
        if ($request->isMethod('post')) {

            $request->validate([
                'title_english'=>'required|unique:post_categories,title_english,'.$request->hidden_id,
                'title_urdu'=>'required|unique:post_categories,title_urdu,'.$request->hidden_id,
            ]);

            if($request->has('hidden_id')){
                $category=Blog_Category::find($request->hidden_id);
            }else{
                $category=new Blog_Category();
                $category->created_at=Date('Y-m-d h:i:s');
            }
            $category->title_english=$request->title_english;
            $category->title_urdu=$request->title_urdu;
            $category->updated_at=Date('Y-m-d h:i:s');
            $category->save();
            return redirect(route('admins.blog_category'))->with([
                'msg'=>'Blog Category Saved Successfully',
                'msg_type'=>'success',
            ]);
        }
        $categories=Blog_Category::all();
        return view('admins.blog_category',compact('categories','edit'));
    }
    public function posts(Request $request,$id=0,$delete=null){

    }
    public function post_form(Request $request,$id=0)
    {

    }
    public function post_delete(){
        
    }

    public function slider(Request $request,$id=0,$delete=null)
    {
        $edit=null;
        if(isset($delete) && $id>0){
            $slider=Slider::find($id);
            $file_path=public_path().'/'.$slider->slider_image;
            if(\File::exists($file_path)){
                \File::delete($file_path);
            }           
            $slider->delete();
            return redirect(route('admins.slider'))->with([
                'msg'=>'Slider Deleted Successfully',
                'msg_type'=>'success',
            ]);
        }
        if($id>0 && !isset($delete)){
            $edit=Slider::find($id);
        }
        if ($request->isMethod('post')) {
            if($request->has('hidden_id')){
                $slider=Slider::find($request->hidden_id);
            }else{
                $slider=new Slider();
                $slider->created_at=Date('Y-m-d h:i:s');
            }
            $slider->updated_at=Date('Y-m-d h:i:s');


            if($request->slider_image)
            {
                if($request->hidden_id){
                    $image=public_path().'/'.$slider->slider_image;
                    if(\File::exists($image)){
                        \File::delete($image);
                    } 
                }
                $img_name=hexdec(uniqid()).'.'.$request->slider_image->getClientOriginalExtension();
                $img_path='/images/sliders/'.$img_name;
                \Image::make($request->slider_image)->save(public_path().'/images/sliders/'.$img_name);
                $slider->slider_image=$img_path;
            }
            $slider->save();
            return redirect(route('admins.slider'))->with([
                'msg'=>'Slider Saved Successfully',
                'msg_type'=>'success',
            ]);
        }
        $sliders=Slider::all();
        return view('admins.slider',compact('sliders','edit'));
    }
    
}
