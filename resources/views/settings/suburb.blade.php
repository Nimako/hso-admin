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


                            <h4 class="page-title">Suburb Setup</h4>

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

                    <div class="col-md-6">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title"></h4>
                           <?php if(empty($info)): ?>
                             <form action="{{url('save-suburb')}}" method="POST">
                           <?php else: ?>
                             <form action="{{ route('suburb.update', $info->id) }}" method="POST">
                              @method('PUT')
                           <?php endif; ?>
                             @csrf

                           <div class="form-group">
                               <label>Suburb</label>
                               <input type="text" class="form-control" autocomplete="off" value="<?= !empty($info)?$info->suburb:null; ?>" name="suburb" placeholder="Enter Suburb">
                           </div>

                           <button class="btn btn-primary btn-sm" name="save" type="submit">Submit</button>

                            </form>

                        </div>
                    </div>


                    <div class="col-6">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title"></h4>

                             <table id="datatable" class="table  table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Suburb</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                 <?php if(!empty($list)): ?>
                                    <?php foreach ($list as $row): ?>
                                     <tr style="cursor:pointer" onclick="window.location='{{url('suburb/'.$row->id.'/edit')}}'">
                                     <td><?= $row->id; ?></td>
                                     <td><?= $row->suburb; ?></td>
                                     <td>
                                        <form action="{{route('suburb.destroy',$row->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                        </form>
                                     </td>
                                     </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div> <!-- container -->

        </div> <!-- End wrapper -->




@endsection
