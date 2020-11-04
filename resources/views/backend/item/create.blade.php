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
            <h2 class="d-inline-block">Item Create Form</h2>
          </div>

          <form method="post" action="{{route('items.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name:</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Item Name..." value="{{old('name')}}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="photo" class="col-sm-2 col-form-label">Photo:</label>
              <div class="col-sm-10">
                <input type="file" name="photo" class="form-control-file @error('photo') is-invalid @enderror" id="photo">
                @error('photo')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="price" class="col-sm-2 col-form-label">Price:</label>
              <div class="col-sm-10">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Current</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Discount</a>
                  </li>
                </ul>
                <div class="tab-content mt-3" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <input type="number" name="price" class="form-control" id="price" value="0">
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <input type="number" name="discount" class="form-control" id="price" value="0">
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group row">
              <label for="description" class="col-sm-2 col-form-label">Description:</label>
              <div class="col-sm-10">
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Item Description..">{{old('description')}}</textarea>
                @error('description')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="form-group row">
              <label for="brand" class="col-sm-2 col-form-label">Brand:</label>
              <div class="col-sm-10">
                <select name="brand" class="form-control @error('brand') is-invalid @enderror" id="brand">
                  <option value="">Choose Brand..</option>
                  @foreach($brands as $brand)
                  <option value="{{$brand->id}}">{{$brand->name}}</option>
                  @endforeach
                </select>
                @error('brand')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>


            <div class="form-group row">
              <label for="subcategory" class="col-sm-2 col-form-label">Subcategory:</label>
              <div class="col-sm-10">
                <select name="subcategory" class="form-control" id="subcategory">
                  <optgroup label="Choose Subcategory">
                    @foreach($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                    @endforeach
                  </optgroup>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-10 col-offset-sm-2">
                <input type="submit" name="btnsubmit" value="Save" class="btn btn-success">
              </div>
            </div>
          </form>
        
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