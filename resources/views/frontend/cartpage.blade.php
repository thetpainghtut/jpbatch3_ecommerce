@extends('frontendtemplate')
@section('content')
  <div class="container">

    <div class="row">

      <div class="col-md-12 my-5">
        <h4 class="text-center">My Shopping Cart!</h4>
        <table class="table table-bordered my-3">
          {{-- id, name, price, photo, quantity --}}
          <thead class="thead-dark">
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                Product One
              </td>
              <td>5,500</td>
              <td>2</td>
              <td>11,000</td>
            </tr>

            <tr>
              <td colspan="3">Total:</td>
              <td>11,000</td>
            </tr>
          </tbody>
        </table>

        {{-- using form method post --}}
        {{-- <form method="post" action="{{route('orders.store')}}">
          @csrf
          <div class="form-group">
            <textarea class="form-control" name="notes" placeholder="Please insert notes..." required></textarea>
            <input type="hidden" name="ls" id="ls">
          </div>
          
          <div class="form-group">
            <input type="submit" name="btnsubmit" value="Checkout" class="btn btn-success">
          </div>
        </form> --}}

        {{-- using ajax post --}}
        <form method="" action="" class="checkoutform">
          <div class="form-group">
            <textarea class="form-control" name="notes" placeholder="Please insert notes..." required id="notes"></textarea>
          </div>
          <div class="form-group">
            @guest
              <a href="{{route('login')}}" class="btn btn-success">Checkout</a>
            @else
              <input type="submit" name="btnsubmit" value="Checkout" class="btn btn-success">
            @endguest
          </div>
        </form>
      </div>

    </div>
    <!-- /.row -->

  </div>
@endsection
@section('script')
  <script type="text/javascript" src="{{asset('frontend_asset/js/custom.js')}}"></script>
  <script type="text/javascript">
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).ready(function (argument) {
      // using form method post
      // $('#ls').val(localStorage.getItem('items'));

      // using ajax post
      $('.checkoutform').submit(function(e){
        let notes = $('#notes').val();
        if (notes === "") {
          return true;
        }else{
          let order = localStorage.getItem('items'); // JSON String
          $.post("{{route('orders.store')}}",{ls:order,notes:notes},function (response) {
            // alert(response.msg);
            localStorage.clear();
            location.href="/";
          })
          e.preventDefault();
        }
      })
    })
  </script>
@endsection