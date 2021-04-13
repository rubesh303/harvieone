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
              
              <form role="form"method="post"action="{{ Route('savetask')}}">
                 @csrf
                <div class="card-body">
                   <div class="row">
                   	 <div class="col-md-3">
                   <div class="form-group">
                    <label for="project_name">Project Name:</label>
                    <select class="form-control"name="project_id">
                     @foreach($projects as $pro)
                     <option value="{{$pro->id}}">{{$pro->project_name}}</option>
                     @endforeach
                    </select>
                  </div></div>
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="task_name">Task name:</label>
                    <input type="text" class="form-control"name="task_name" id="task_name" placeholder="Enter Task name">
                  </div></div>
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="task_desc">Task desc:</label>
                    
                    <textarea name="task_desc"class="form-control"></textarea>
                  </div></div>
                 
                <div class="col-md-3">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Task Owner:</label>
                    <select class="form-control"name="task_owner">
                     @foreach($employees as $emp)
                     <option value="{{$emp->id}}">{{$emp->name}}</option>
                     @endforeach
                    </select>
                  </div>
              </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="dob">Task due date:</label>
                   <input type="text" class="form-control datepicker"name="due_date"id="dob" readonly>
                   </div></div>
                  <div class="col-md-3">
                    <div class="form-group">
                    <label for="doj">Task End Date:</label>
                    <input type="text" class="form-control datepicker"name="completed_date" readonly>
                  </div>
              	</div>  
                 
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="task_desc">Comments:</label>
                    
                    <textarea name="comments"class="form-control"></textarea>>
                  </div>
              </div>
               <div class="col-md-3">
                  <div class="form-group">
                     <label>Color picker:</label>
                  <input type="text"name="task_color" class="form-control my-colorpicker1">
                  </div>
              </div>
              <div class="col-md-3">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Followed employee:</label>
                    <select class="form-control"name="followed_emp">
                     @foreach($employees as $emp)
                     <option value="{{$emp->id}}">{{$emp->name}}</option>
                     @endforeach
                    </select>
                  </div>
              </div>
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
