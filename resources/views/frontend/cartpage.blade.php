@extends('frontendtemplate')
@section('content')
  <div class="container">

    <div class="row">

      <div class="col-md-12 my-5">
        <table class="table table-bordered">
          {{-- id, name, price, photo, quantity --}}
        </table>
      </div>

    </div>
    <!-- /.row -->

  </div>
@endsection
@section('script')
  <script type="text/javascript" src="{{asset('frontend_asset/js/custom.js')}}"></script>
@endsection