@extends('frontendtemplate')
@section('content')
  <div class="container">

    <div class="row">

      <div class="col-md-12 my-5">
        <div class="card mb-3 border-0">
          <div class="row no-gutters">
            <div class="col-md-6">
              <img src="{{asset($item->photo)}}" class="card-img w-50 d-block mx-auto" alt="...">
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <h5 class="card-title">{{$item->name}} ({{$item->codeno}})</h5>
                <p class="card-text">{{number_format($item->price)}} MMK</p>
                <p class="card-text"><span class="badge badge-pill badge-info">{{$item->brand->name}}</span><span class="ml-3 badge badge-pill badge-dark">{{$item->subcategory->name}}</span></p>
                <p class="card-text">
                  <input type="number" name="qty" class="form-control w-25 qty d-inline-block mr-2" min="1" value="1"><button class="btn btn-success addToCart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}"> Add To Cart</button>
                </p>
                <p class="card-text"></p>

                <strong>Description: </strong>
                <p class="card-text">{{$item->description}}</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          {!! $item->detail !!}
        </div>
      </div>

    </div>
    <!-- /.row -->

  </div>
@endsection
@section('script')
  <script type="text/javascript" src="{{asset('frontend_asset/js/custom.js')}}"></script>
@endsection