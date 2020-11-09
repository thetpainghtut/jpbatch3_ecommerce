@extends('frontendtemplate')
@section('content')
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <div class="list-group my-4">
          @foreach($categories as $category)
            <a href="#" class="list-group-item">{{$category->name}}</a>
          @endforeach
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="{{asset('frontend_asset/images/banner1.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="{{asset('frontend_asset/images/banner2.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="{{asset('frontend_asset/images/banner3.jpg')}}" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

    {{-- Show All Discount Items --}}
    <div class="row my-3">
      <div class="col-md-12">
        <p>ပရိုမိုးရှင်းနောက်ဆုံးနေ့ပစ္စည်းများ</p>
      </div>
      @foreach($items as $item)
      <div class="col-lg-3 col-md-6 my-4">
        <div class="card h-100">
          <a href="{{route('itemdetail',$item->id)}}"><img class="card-img-top" src="{{asset($item->photo)}}" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">{{$item->name}}</a>
            </h4>
            <h5>{{$item->price}} MMK</h5>
            <p class="card-text">{{$item->description}}</p>
          </div>
          <div class="card-footer">
            <input type="hidden" name="qty" class="qty" value="1">
            <a href="#" class="btn btn-dark addToCart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}">Add to Cart</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <!-- /.row -->

    {{-- Show all brands --}}
    <div class="row my-5">
      <div class="col-md-12">
        <p style="border-bottom: 2px solid green; padding-bottom: 5px;">ရရှိနိုင်သည့်အမှတ်တံဆိပ်များ</p>
      </div>
      @foreach($brands as $brand)
      <div class="col-md-2 my-3">
        <img src="{{asset($brand->photo)}}" class="img-fluid" alt="">
        {{-- <p class="text-center mt-2">{{$brand->name}}</p> --}}
      </div>
      @endforeach
    </div>

    {{-- Show all categories --}}
    <div class="row my-5">
      <div class="col-md-12">
        <p style="border-bottom: 2px solid green; padding-bottom: 5px;">အမျိုးအစားများ</p>
      </div>
      @foreach($categories as $category)
      <div class="col-md-2 my-3">
        <img src="{{asset($category->photo)}}" class="img-fluid" alt="">
        <p class="text-center mt-2">{{$category->name}}</p>
      </div>
      @endforeach
    </div>
  </div>
@endsection

@section('script')
  <script type="text/javascript" src="{{asset('frontend_asset/js/custom.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function (argument) {
      
    })
  </script>
@endsection