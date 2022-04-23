@extends('admins.master')
<style>
    label{
        text-align: left !important;
    }
    .bootstrap-tagsinput{
        width:100% !important;
    }
</style>
@section('title','Product Form')

@section('product_active','active')

@section('product_active_c1','collapse in')

@section('product_child_1_active','active')


@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Product Form</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="sub_cat_id" value="<?php echo isset($edit->subcategory_id) ? $edit->subcategory_id : 0; ?>">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group"><label class="col-sm-12 control-label">Product Name:</label>
                                    <div class="col-sm-12"><input type="text" value="<?php echo isset($edit->product_name) ? htmlspecialchars($edit->product_name) : null; ?>" required class="form-control" name="product_name"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group"><label class="col-sm-12 control-label">Product Code:</label>
                                    <div class="col-sm-12"><input type="text" required class="form-control" name="product_code" value="<?php echo isset($edit->product_code) ? htmlspecialchars($edit->product_code) : null; ?>"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group"><label class="col-sm-12 control-label">Quantity:</label>
                                    <div class="col-sm-12"><input type="number" required class="form-control" value="<?php echo isset($edit->product_quantity) ? htmlspecialchars($edit->product_quantity) : null; ?>" min="1" name="product_quantity"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group"><label class="col-sm-12 control-label">Category:</label>
                                    <div class="col-sm-12">
                                    <select required class="form-control" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option <?php echo isset($edit->category_id) && $edit->category_id==$category->id ? "selected" : null; ?> value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group"><label class="col-sm-12 control-label">Sub Category:</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="subcategory_id">
                                        </select>
                                        </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group"><label class="col-sm-12 control-label">Brand:</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="brand_id">
                                            <option value="">Select Brand</option>
                                            @foreach($brands as $brand)
                                            <option <?php echo isset($edit->brand_id) && $edit->brand_id==$brand->id ? "selected" : null; ?> value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group"><label class="col-sm-12 control-label">Product Size:</label>
                                    <div class="col-sm-12"><input type="text" data-role="tagsinput" class="form-control" value="<?php echo isset($edit->product_size) ? htmlspecialchars($edit->product_size) : null; ?>" name="product_size" ></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group"><label class="col-sm-12 control-label">Product Color:</label>
                                    <div class="col-sm-12"><input type="text" data-role="tagsinput" class="form-control" value="<?php echo isset($edit->product_color) ? htmlspecialchars($edit->product_color) : null; ?>" name="product_color"></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group"><label class="col-sm-12 control-label">Selling Price:</label>
                                    <div class="col-sm-12"><input type="number" required class="form-control" min="1" value="<?php echo isset($edit->selling_price) ? htmlspecialchars($edit->selling_price) : null; ?>" name="selling_price"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group"><label class="col-sm-12 control-label">Product Details:</label>
                                    <div class="col-sm-12">
                                        <textarea class="summernote" name="product_details" rows="5">
                                            <?php echo isset($edit->product_details) ? htmlspecialchars($edit->product_details) : null; ?>
        
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group"><label class="col-sm-12 control-label">Video Link:</label>
                                    <div class="col-sm-12">
                                        <input type="text" value="<?php echo isset($edit->video_link) ? htmlspecialchars($edit->video_link) : null; ?>" class="form-control" name="video_link">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group"><label class="col-sm-12 control-label">Image One (Main Thumbnail):</label>
                                    <div class="col-sm-12"><input type="file" onchange="readURL(this);" <?php echo isset($edit->id) ? null : "required"; ?> accept="image/png, image/gif, image/jpeg" class="form-control" name="image_one">
                                    <img src="<?php echo isset($edit->image_one) ? asset($edit->image_one) : null; ?>"  alt="" <?php echo isset($edit->image_one) ? 'style="width:100px;"' : 'style="display:none;width:100px;"'; ?>></div>
                                </div>
                            </div> 
                            <div class="col-sm-4">
                                <div class="form-group"><label class="col-sm-12 control-label">Image Two:</label>
                                    <div class="col-sm-12"><input type="file" onchange="readURL(this);" accept="image/png, image/gif, image/jpeg" class="form-control" name="image_two">
                                        <img src="<?php echo isset($edit->image_two) ? asset($edit->image_two) : null; ?>"  alt="" <?php echo isset($edit->image_two) ? 'style="width:100px;"' : 'style="display:none;width:100px;"'; ?>></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group"><label class="col-sm-12 control-label">Image Three:</label>
                                    <div class="col-sm-12"><input type="file" onchange="readURL(this);" accept="image/png, image/gif, image/jpeg" class="form-control" name="image_three">
                                        <img src="<?php echo isset($edit->image_three) ? asset($edit->image_three) : null; ?>"  alt="" <?php echo isset($edit->image_three) ? 'style="width:100px;"' : 'style="display:none;width:100px;"'; ?>></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <input type="checkbox" <?php echo isset($edit->main_slider) && $edit->main_slider==1 ? "checked" : null; ?> id="checkbox1" value="1" name="main_slider">
                                            <label for="checkbox1">
                                                Main Slider
                                            </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <input type="checkbox" id="checkbox1" <?php echo isset($edit->trend) && $edit->trend==1 ? "checked" : null; ?> value="1" name="trend">
                                            <label for="checkbox1">
                                                Trend Product
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <input type="checkbox" <?php echo isset($edit->hot_deal) && $edit->hot_deal==1 ? "checked" : null; ?> id="checkbox1" value="1" name="hot_deal">
                                            <label for="checkbox1">
                                                Hot Deal
                                            </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <input type="checkbox" <?php echo isset($edit->mid_slider) && $edit->mid_slider==1 ? "checked" : null; ?> id="checkbox1" value="1" name="mid_slider">
                                            <label for="checkbox1">
                                                Mid Slider
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <input type="checkbox" <?php echo isset($edit->best_rated) && $edit->best_rated==1 ? "checked" : null; ?>  id="checkbox1" value="1" name="best_rated">
                                            <label for="checkbox1">
                                                Best Rated
                                            </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <input type="checkbox" id="checkbox1" <?php echo isset($edit->hot_new) && $edit->hot_new==1 ? "checked" : null; ?> value="1" name="hot_new">
                                            <label for="checkbox1">
                                                Hot New
                                            </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(isset($edit->id))
                        <input type="hidden" name="hidden_id" value="{{$edit->id}}">
                        @endif
                        <div class="form-group">
                            <div class="col-sm-10"><button class="btn btn-md btn-primary" type="submit"><strong>Save</strong></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
  </div>
@endsection

@push('scripts')

<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $(input).parent().find('img').attr('src', e.target.result).show();
        };

        reader.readAsDataURL(input.files[0]);
    }
    }
    $(function(){
        let sub_cat_id=$('input[name="sub_cat_id"]').val();
        let cat_id=$('select[name="category_id"]').val();
        getSubCats(cat_id,sub_cat_id);
        $('select[name="category_id"]').change(function(){
            getSubCats($(this).val(),0);
        });
        function getSubCats(cat_id,sub_cat_id)
        {
            if(cat_id!=''){
                $.ajax({
                    url : "{{route('admins.get_subCategory_html')}}",
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    type : "POST",
                    data : "category_id="+cat_id+"&sub_category_id="+sub_cat_id,
                    success : function(response){
                        console.log(response);
                        $('select[name="subcategory_id"]').html("").html(response);
                    }
                });
            }

        }
 
    });
</script>

@endpush