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
                <h3 class="card-title">Employee Details</h3>
                @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form role="form"method="post"action="{{ Route('updateemploye')}}">
                 @csrf
                <div class="card-body">
                   <div class="row">
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="name">Employee Name</label>
                    <input type="hidden"name="id"value="{{$employees->user_id}}">
                    <input type="text" class="form-control"name="name"value="{{$employees->emp_name}}" id="name">
                  </div></div>
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="p_email">Personal Email:</label>
                    <input type="email" class="form-control"name="p_email" id="p_email"value="{{$employees->p_email}}"readonly>
                  </div></div>
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="o_email">Official Email:</label>
                    <input type="email" class="form-control"name="o_email" id="o_email" value="{{$employees->o_email}}"readonly>
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label for="phone">Contact No:</label>
                    <input type="text" class="form-control"name="phone" id="phone"value="{{$employees->phone}}">
                  </div>
                </div>
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="dob">Date of birth:</label>
                   <input type="text" class="form-control datepicker"name="dob"id="dob"value="{{$employees->dob}}" readonly>
                   </div></div>
                  <div class="col-md-3">
                    <div class="form-group">
                    <label for="doj">Date of joining:</label>
                    <input type="text" class="form-control datepicker"name="doj"value="{{$employees->doj}}" readonly>
                  </div></div>
                  <div class="col-md-3">
                  <div class="form-group">
                    <label for="experiance">Year of experience:</label>
                    <input type="text" class="form-control"name="experiance" id="experiance"value="{{$employees->experiance}}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address:</label>
                   <textarea class="form-control"name="address">{{$employees->address}}</textarea>
                  </div>
                </div>
                <div class="col-md-3">
                   <div class="form-group">
                    <label for="exampleInputEmail1">Current designation:</label>
                    <select class="form-control"name="designation">
                     @foreach($designtions as $desig)
                     <?php $selected='';
                     if($desig->id ==$employees->designation){
                      $selected='selected';
                      } ?>
                     <option value="{{$desig->id}}"<?php echo $selected ?>>{{$desig->designation_name}}</option>
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