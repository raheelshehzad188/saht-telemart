@extends('admins.master')

@section('title','Category')

@section('category_active','active')

@section('category_child_1_active','active')

@section('category_active_c1','collapse in')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5>Category Form</h5>
              <div class="ibox-tools">
                  <a class="collapse-link">
                      <i class="fa fa-chevron-up"></i>
                  </a>
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-wrench"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li><a href="#">Config option 1</a>
                      </li>
                      <li><a href="#">Config option 2</a>
                      </li>
                  </ul>
                  <a class="close-link">
                      <i class="fa fa-times"></i>
                  </a>
              </div>
          </div>
          <div class="ibox-content">
              <form role="form" class="form-inline" autocomplete="off" method="post">
                  @csrf
                  <div class="form-group">
                      <label for="exampleInputEmail2" class="sr-only">Category</label>
                      <input type="text" required name="name" value="{{isset($edit->name) ? $edit->name : ""}}" id="exampleInputEmail2" class="form-control">
                      @error('name')
                      <span class="help-block m-b-none text-danger">{{$message}}</span>
                      @enderror
                      @if(isset($edit->id))
                      <input type="hidden" name="hidden_id" value="{{$edit->id}}">
                      @endif
                  </div>
                  <button class="btn btn-sm btn-primary" type="submit"><strong>Save</strong></button>
              </form>
          </div>
      </div>
  </div>
    </div>
  <div class="row">
      <div class="col-lg-12">
      <div class="ibox float-e-margins">
          <div class="ibox-title">
              <h5>Category List</h5>
              <div class="ibox-tools">
                  <a class="collapse-link">
                      <i class="fa fa-chevron-up"></i>
                  </a>
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-wrench"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li><a href="#">Config option 1</a>
                      </li>
                      <li><a href="#">Config option 2</a>
                      </li>
                  </ul>
                  <a class="close-link">
                      <i class="fa fa-times"></i>
                  </a>
              </div>
          </div>
          <div class="ibox-content">

              <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover dataTables-example" >
          <thead>
          <tr>
              <th>Sr.No</th>
              <th>Category</th>
              <th>Creation Ago</th>
              <th>Action</th>
          </tr>
          </thead>
          <tbody>
            @php $sr=1; @endphp
            @foreach ($categories as $item)
                <tr>
                  <td>{{$sr++}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</td>
                  <td>
                    <a href="{{route('admins.category')}}/{{$item->id}}" class="btn btn-warning">Edit</a>
                    <a href="javascript:void(0)" data-href="{{route('admins.category')}}/{{$item->id}}/{{'delete'}}"  class="btn btn-danger delete_record">Delete</a>
                  </td>
                </tr>
            @endforeach
          </tbody>
          </table>
              </div>

          </div>
      </div>
  </div>
  </div>
</div>
@endsection