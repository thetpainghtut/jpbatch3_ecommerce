{{-- <div>
    He who is contented is rich. - Laozi
</div> --}}

<div class="col-lg-3 col-md-6 my-4">
  <div class="card h-100">
    <a href="{{route('itemdetail',$item->id)}}"><img class="card-img-top" src="{{asset($item->photo)}}" alt=""></a>
    <div class="card-body">
      <h4 class="card-title">
        <a href="#">{{$item->name}}</a>
      </h4>
      <h5>{{$item->price}} Ks</h5>
      <p class="card-text">{{$item->description}}</p>
    </div>
    <div class="card-footer">
      <input type="hidden" name="qty" class="qty" value="1">
      <a href="#" class="btn btn-dark addToCart" data-id="{{$item->id}}" data-name="{{$item->name}}" data-photo="{{$item->photo}}" data-price="{{$item->price}}">Add to Cart</a>
    </div>
  </div>
</div>