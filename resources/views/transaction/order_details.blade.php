
@extends('layouts.tempMain')
@section('content')

<style>
.card-box h2  {font-size: 1.3em}
.card-box h6  {font-size: 0.6em}
.icon-chart  {font-size: 0.3em}
.tilebox-one i {font-size:20px;}
.datepicker1, .datepicker2{font-size:0.7em}
</style>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="wrapper">
            <div class="container"><br><br>

                <!-- Page-Title -->
                <!--<div class="row" >
                    <div class="col-sm-12">
                        <div class="page-title-box">

                            <h4 class="page-title text-center text-uppercase text-danger" style="text-decoration:underline">
                                <?php // @$info->Status; ?>
                            </h4> 
                        </div>
                    </div>
                </div> -->
                <!-- end row -->

                <div class="row">
                <div class="col-md-3">
                    <div class="card-box tilebox-one">
                        <h5 class="text-muted text-uppercase m-b-20">ORDER CODE</h5>
                        <h1 class="m-b-20 text-uppercase"><?= !empty($info->PurchaseNumber)?$info->PurchaseNumber:''; ?></h1>

                        <p class="text-uppercase badge badge-primary"><?= @$info->Status; ?></p>

                    </div>          
                </div>

                <div class="col-md-4">

                    <table>
                        <tr>
                            <td class="text-left"><b>Customer Name:</b></td>
                            <td class="text-right"><?= !empty($info->CustomerName)?$info->CustomerName:''; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left"><b>Phone Number:</td>
                            <td class="text-right"><?= !empty($info->CustomerPhone)?$info->CustomerPhone:''; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left"><b>Email:</td>
                            <td class="text-right"><?= !empty($info->CustomerEmail)?$info->CustomerEmail:''; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left"><b>Location/Address:</td>
                            <td class="text-right"><?= !empty($info->Location)?$info->Location:''; ?></td>
                        </tr>



                    </table>
                </div>

                <div class="col-md-4">
                    
                    <table>
                        <tr>
                            <td class="text-left"><b>Show Room:</b> </td>
                            <td class="text-right"><?= !empty($info->ShowRoomCode)?$info->ShowRoomCode:''; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left"><b>New Customer:</b></td>
                            <td class="text-right"><?= !empty($info->NewCustomer)?$info->NewCustomer:''; ?></td>
                        </tr>
                        <tr>
                            <td class="text-left"><b>Number Of Product:</b></td>
                            <td class="text-right"><?= !empty($info->NumberOfProduct)?$info->NumberOfProduct:''; ?></td>
                        </tr>

                    </table>
                    
                </div>

            </div>
            <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="m-t-0 header-title"></h4>

                             <table id="datatabl" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Item Name</th>
                                    <th>Unit Price</th>
                                    <th>Qty</th>
                                    <th>Serial Number</th>
                                </tr>
                                </thead>
                                 <?php if(!empty($list)): $x=1; ?>
                                  <?php foreach($list as $row): ?>
                                    <tr>
                                        <th><?= $x++; ?></th>
                                        <td class="text-left"><?= $row->ItemName; ?></td>
                                        <td><?= $row->Price; ?></td>
                                        <td><?= $row->Qty; ?></td>
                                        <td></td>
                                    </tr>
                                <?php endforeach; ?>
                                 <?php endif; ?>
                                <tbody>
                                </tbody>
                            </table>

                        <?php //if(!empty($list) ): ?>

                           {{-- {{ //$list->links() }} --}}

                        <?php //endif; ?>

      
                        <div class="col-md-4 offset-4">
                            <select class="form-control" name="status">
                                <option value="">Select Status</option>
                                <option value="complete">COMPLETE</option>
                                <option value="draft">CANCEL</option>
                            </select>
                            <br>

                            <button class="btn btn-success btn-sm btn-block">Submit</button>

                        </div>              

                     </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container -->


     </div> <!-- End wrapper -->
     
@endsection

