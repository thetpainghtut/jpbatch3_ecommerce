@extends('frontendtemplate')
@section('content')
  <div class="container">

    <div class="row">

      <div class="col-md-12 my-5">
        <div class="card mb-3 border-0">
          <div class="row no-gutters">
            <div class="col-md-6">
              <img src="{{asset($item->photo)}}" class="card-img" alt="...">
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <h5 class="card-title">{{$item->name}} ({{$item->codeno}})</h5>
                <p class="card-text">{{number_format($item->price)}} MMK</p>
                <p class="card-text"><span class="badge badge-pill badge-info">{{$item->brand->name}}</span><span class="ml-3 badge badge-pill badge-dark">{{$item->subcategory->name}}</span></p>
                <p class="card-text">
                  <input type="number" name="qty" class="form-control w-25" min="1" value="1">
                </p>
                <p class="card-text"><button class="btn btn-success"> Add To Card</button></p>
              </div>
            </div>
          </div>

          <div class="card-footer mt-3">
            <strong>Description: </strong>
            {{$item->description}}
          </div>
        </div>
      </div>

    </div>
    <!-- /.row -->

  </div>
@endsection
@section('script')
  <script type="text/javascript" src="{{asset('frontend_asset/js/custom.js')}}"></script>
@endsection