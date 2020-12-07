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


                            <h4 class="page-title">Fees Setup</h4>

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
                             <form action="{{url('save-fees')}}" method="POST">
                           <?php else: ?>
                             <form action="{{ route('fees.update', $info->id) }}" method="POST">
                              @method('PUT')
                           <?php endif; ?>
                             @csrf

                           <div class="form-group">
                               <label>Type of Revenue</label>
                               <input type="text" class="form-control" autocomplete="off" value="<?= !empty($info)?$info->revenue_type:null; ?>" name="revenue_type" placeholder="Enter revenue type">
                           </div>

                           <div class="form-group">
                               <label>Fee Amount</label>
                               <input type="text" class="form-control" autocomplete="off" value="<?= !empty($info)?$info->amount:null; ?>" name="amount" placeholder="0.00">
                           </div>

                          <div class="form-group">
                               <label>Category</label>
                                <select class="form-control" name="category">
                                   <option value=""></option>
                                   <option <?= !empty($info)&&$info->category=="CLIENT-PAYMENT"?"selected=''":null; ?> value="CLIENT-PAYMENT">CLIENT-PAYMENT</option>
                                   <option <?= !empty($info)&&$info->category=="CASH-PAYMENT"?"selected=''":null; ?> value="CASH-PAYMENT">CASH-PAYMENT</option>
                               </select>
                          </div>

                          <?php if(!empty($info)): ?>
                          <div class="form-group">
                               <label>Status</label>
                               <select class="form-control" name="status">
                                   <option <?= !empty($info)&&$info->status=="ACTIVE"?"selected=''":null; ?> value="ACTIVE">ACTIVE</option>
                                   <option <?= !empty($info)&&$info->status=="INACTIVE"?"selected=''":null; ?> value="INACTIVE">INACTIVE</option>
                               </select>
                           </div>
                         <?php endif; ?>

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
                                    <th>Type</th>
                                    <th>Fees</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                 <?php if(!empty($list)): ?>
                                    <?php foreach ($list as $row): ?>
                                     <tr style="cursor:pointer" onclick="window.location='{{url('fees/'.$row->id.'/edit')}}'">
                                     <td><?= $row->revenue_type; ?></td>
                                      <td><?= $row->amount; ?></td>
                                      <td><?= $row->category; ?></td>
                                      <td><?= $row->status; ?></td>
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
