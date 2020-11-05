@extends('frontendtemplate')
@section('content')
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
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
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
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
            <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
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