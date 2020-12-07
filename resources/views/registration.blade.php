@extends('layouts.tempMain')
@section('content')


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">

                            <h4 class="page-title">User Management</h4>

                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                            </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">

                    <div class="col-md-12">
                        <div class="card-box">
                        <h4 class="m-t-0 header-title"></h4>
                        <?php if(empty($info)): ?>
                        <form action="{{url('post-registration')}}" method="POST" id="regForm">
                        <?php else: ?>
                        <form action="{{url('update-registration')}}" method="POST" id="regForm">
                        <?php endif; ?>
                        {{ csrf_field() }}
                       <section class="row">

                        <div class="col-md-6">

                            <?php if(!empty($info)): ?>
                               <input type="hidden" name="user_id" value="<?= ($info->id); ?>">
                            <?php endif; ?>
                            
                            <div class="form-label-group">
                                <input type="text" id="inputName" value="<?= !empty($info)?$info->FullName:null; ?>" required="" name="FullName" class="form-control" placeholder="Full name" autofocus>

                                @if ($errors->has('FullName'))
                                <span class="error">{{ $errors->first('FullName') }}</span>
                                @endif
                            </div><br>

                            <div class="form-label-group">
                                <input type="email" name="email" value="<?= !empty($info)?$info->email:null; ?>" required="" id="inputEmail" class="form-control" placeholder="Email address" >
    
                                @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div><br>

                            <div class="form-label-group">
                                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
    
                                @if ($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-label-group">
                                <select class="form-control" name="ShowRoomID" id="ShowRoomID" required>
                                    <option value="">--Select show room</option>
                                    <?php if(!empty($showroom)): ?>
                                    <?php foreach($showroom as $item): ?>
                                    <option <?= @$info->ShowRoomID==$item->ID?"selected":null; ?> value="<?= $item->ID; ?>"><?= $item->name; ?></option>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div><br>

                            <?php $userType = ["CASHIER","WAREHOUSE","ATTENDANT","SUPERVISOER","MANAGER","ADMIN"]; ?>

                            <div class="form-label-group">
                                <select class="form-control" name="UserType" id="UserType" required>
                                    <option value="">--Select user type</option>
                                    <?php foreach($userType as $item): ?>
                                      <option <?= @$info->UserType==$item?"selected":null; ?> value="<?= $item; ?>"><?= $item; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div><br>

                            <br>
                        </div>

                        <div class="col-md-12">
                        <center><br>
                        <button class="btn btn-md btn-primary btn-login text-center text-uppercase font-weight-bold mb-2" type="submit">SUBMIT</button>
                        </center>

                        <hr>

                         <table id="datatable" class="table  table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Show Room</th>
                                <th>User Type</th>
                                <th></th>
                            </tr>
                            </thead>
                             <?php if(!empty($list)): ?>
                                <?php foreach ($list as $row): ?>
                                 <tr style="cursor:pointer" onclick="window.location='{{url('user-edit/'.$row->id)}}'">
                                 <td><?= $row->id; ?></td>
                                 <td><?= $row->FullName; ?></td>
                                  <td><?= $row->email; ?></td>
                                  <td><?= $row->ShowRoomName; ?></td>
                                  <td><?= $row->UserType; ?></td>
                                  <td>
                                      <a href="{{url('delete-registration/'. $row->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want perform this action.This action can not undo if you proceed');">DELETE</a>
                                    </td>
                                 </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <tbody>
                            </tbody>
                        </table>

                       </div>

                       </section>
                    </form>
                     </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- container -->

        </div> <!-- End wrapper -->

@endsection
