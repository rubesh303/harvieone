  @extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <form>
        <div class="row">
          <div class="col-md-3">
                  <div class="form-group">
                    <label for="dob">Task due date:</label>
                   <input type="text" class="form-control datepicker"name="due_date"id="dob" readonly>
                   </div>
                 </div>
                  <div class="col-md-3">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Followed employee:</label>
                    <select class="form-control"name="employee">
                     @foreach($employees as $emp)
                     
                     <option value="{{$emp->id}}">{{$emp->name}}</option>
                     @endforeach
                    </select>
                  </div>
              </div>
              <div class="col-md-3">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Status:</label>
                    <select class="form-control"name="status">
                    
                     <option value="1">Active</option>
                     <option value="0">InActive</option>
                    </select>
                  </div>
              </div>
              <div class="col-md-3">
                <label for="filter"></label>
              <input type="submit"name="filter"value="Filter"id="filter"class="btn btn-success">
            </div>
        </div>
       </form>
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          @foreach($tasks as $t)
          <section class="col-lg-4 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  {{$t->task_name}}
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
               
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
         @endforeach
        </div>
        <!-- /.row (main row) -->
        <!-- Styled Pagination -->
                        <div class="styled-pagination text-center">
                            <ul class="clearfix">
                               
                                 <div class="d-flex justify-content-center">
                            {!! $tasks->links() !!}
                            </div>
                                
                            </ul>
                           
                        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection