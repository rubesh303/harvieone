	   @extends('layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Project Details</h3>
                @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form role="form"method="post"action="{{ Route('saveproject')}}">
                 @csrf
                <div class="card-body">
                   <div class="row">
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="project_name">Project Name</label>
                    <input type="text" class="form-control"name="project_name" id="project_name" placeholder="Enter email">
                  </div></div>
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="project_desc">Project desc:</label>
                    <input type="text" class="form-control"name="project_desc" id="project_desc" placeholder="Enter email">
                  </div></div>
                 
                <div class="col-md-3">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Project Owner:</label>
                    <select class="form-control"name="project_owner">
                     @foreach($employees as $emp)
                     <option value="{{$emp->id}}">{{$emp->name}}</option>
                     @endforeach
                    </select>
                  </div></div>
                 
                 
                
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            
            </div>
            <!-- /.card -->

           


          
         
          </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   
@endsection