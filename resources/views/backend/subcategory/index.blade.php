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
            <h2 class="d-inline-block">Subcategory List</h2>
            <a href="#" class="btn btn-primary float-right">Add New</a>
          </div>
          
          <table class="table table-bordered dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Category Name</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php
                $i=1;
              @endphp
              @foreach($subcategories as $row)
              <tr>
                <td>{{$i++}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->category->name}}</td>
                <td>
                  <a href="#" class="btn btn-info">show</a>
                  <a href="#" class="btn btn-warning">edit</a>
                  <a href="#" class="btn btn-danger">delete</a>
                </td>
              </tr>
              @endforeach
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