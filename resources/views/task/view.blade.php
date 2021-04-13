  @extends('layouts.app')

@section('content')

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped datatables">
                  <thead>
                  <tr>
                    <th>Project Name</th>
                    <th>Task Name</th>
                    <th>Due Date</th>
                    <th>Complete Date</th>
                    <th>Followed Employee</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 @foreach($tasks as $t)
                 <tr>
                 	<td>{{$t->project_name}}</td>
                 	<td>{{$t->task_name}}</td>
                 	<td>{{$t->due_date}}</td>
                 	<td>{{$t->completed_date}}</td>
                 	<td>{{$t->name}}</td>
                 	<td><a href="{{url('edit_task/'.$t->id)}}"><i class="fas fa-edit"></i></a> &nbsp <a href="{{url('delete_task/'.$t->id)}}"><i class="fas fa-trash-alt"></i></a></td>
                 </tr>
                 @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Project Name</th>
                    <th>Task Name</th>
                    <th>Due Date</th>
                    <th>Complete Date</th>
                    <th>Followed Employee</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection