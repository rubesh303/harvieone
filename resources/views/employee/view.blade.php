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
              <li class="breadcrumb-item active">Employees</li>
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
                <h3 class="card-title">Employees List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped datatables">
                  <thead>
                  <tr>
                    <th>Employee Name</th>
                    <th>Official Email</th>
                    <th>Personal Email(s)</th>
                    <th>Phone</th>
                    <th>Designation</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($employees as $emp)
                  <tr>
                  <td>{{ $emp->name}}</td>
                  <td>{{$emp->o_email}}</td>
                  <td>{{$emp->p_email}}</td>
                  <td>{{$emp->phone}}</td>
                  <td>{{$emp->designation_name}}</td>
                  <td><a href="{{url('edit_employee/'.$emp->emp_id)}}"><i class="fas fa-edit"></i></a> &nbsp <a href="{{url('delete_employee/'.$emp->emp_id)}}"><i class="fas fa-trash-alt"></i></a></td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                   <tr>
                    <th>Employee Name</th>
                    <th>Official Email</th>
                    <th>Personal Email(s)</th>
                    <th>Phone</th>
                    <th>Designation</th>
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