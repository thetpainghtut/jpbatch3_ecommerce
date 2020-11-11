@extends('backendtemplate')

@section('content')
  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
        <p>Start a beautiful journey here</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <div class="title-header">
            <h2 class="d-inline-block">Order Detail</h2>
          </div>

          <table class="table table-bordered">
            <thead class="thead-dark">
              <tr>
                <th>Voucher No</th>
                <th>Order Date</th>
                <th>Customer Name</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{$order->voucherno}}</td>
                <td>{{$order->orderdate}}</td>
                <td>{{$order->user->name}}</td>
              </tr>
            </tbody>
          </table>

          <table class="table table-bordered dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @php $i=1; $total=0; @endphp
              @foreach($order->items as $item)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->pivot->qty}}</td>
                <td>{{number_format($item->price)}} Ks</td>
                <td>{{number_format($item->price*$item->pivot->qty)}} Ks</td>
              </tr>
              @php $total += $item->price*$item->pivot->qty; @endphp
              @endforeach
              <tr>
                <td colspan="4">Total</td>
                <td>{{number_format($total)}} Ks</td>
              </tr>
            </tbody>
          </table>
        
        </div>
      </div>
    </div>
  </main>
@endsection

@section('script')
  <script type="text/javascript" src="{{ asset('backend_asset/js/plugins/jquery.dataTables.min.js')}}"></script>
  <script type="text/javascript" src="{{ asset('backend_asset/js/plugins/dataTables.bootstrap.min.js')}}"></script>
  <script type="text/javascript">
    $('.dataTable').DataTable();
  </script>
@endsection