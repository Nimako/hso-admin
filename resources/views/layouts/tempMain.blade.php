<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{ asset('lib/assets/images/favicon.ico')}}">

    <!-- App title -->
    <title>HISENSE</title>

        <!-- DataTables -->
    <link href="{{ asset('lib/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('lib/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('lib/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Multi Item Selection examples -->
    <link href="{{ asset('lib/assets/plugins/datatables/select.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

     <!-- Custom box css -->
        <link href="{{ asset('lib/assets/plugins/custombox/css/custombox.min.css')}}" rel="stylesheet">

    <!-- Switchery css -->
    <link href="{{ asset('lib/assets/plugins/switchery/switchery.min.css')}}" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="{{ asset('lib/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App CSS -->
    <link href="{{ asset('lib/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- Modernizr js -->
    <script src="{{ asset('lib/assets/js/modernizr.min.js')}}"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <style>
        #topnav .topbar-main {
         background-color: green;
          }
    th ,td {text-align: center}

   .table td, .table th {
    padding: .25rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    text-align: center
    }
   </style>

</head>

<body>

    @include('layouts.menu')
    @yield('content')


          <!-- jQuery  -->
        <script src="{{ asset('lib/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('lib/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('lib/assets/js/waves.js')}}"></script>
        <script src="{{ asset('lib/assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{ asset('lib/assets/plugins/switchery/switchery.min.js')}}"></script>

        <!-- Required datatable js -->
        <script src="{{ asset('lib/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('lib/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{ asset('lib/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('lib/assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('lib/assets/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{ asset('lib/assets/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{ asset('lib/assets/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{ asset('lib/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('lib/assets/plugins/datatables/buttons.print.min.js')}}"></script>


        <!-- Modal-Effect -->
        <script src="{{ asset('lib/assets/plugins/custombox/js/custombox.min.js')}}"></script>
        <script src="{{ asset('lib/assets/plugins/custombox/js/legacy.min.js')}}"></script>

        <!-- Key Tables -->
        <script src="{{ asset('lib/assets/plugins/datatables/dataTables.keyTable.min.js')}}"></script>

        <!-- Responsive examples -->
        <script src="{{ asset('lib/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('lib/assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

        <!-- Selection table -->
        <script src="{{ asset('lib/assets/plugins/datatables/dataTables.select.min.js')}}"></script>

                <!-- Counter Up  -->
        <script src="{{ asset('lib/assets/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('lib/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('lib/assets/js/jquery.core.js')}}"></script>
        <script src="{{ asset('lib/assets/js/jquery.app.js')}}"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

        <script>
            $(document).ready(function() {

                // Default Datatable
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons_').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                // Key Tables

                $('#key-table').DataTable({
                    keys: true
                });

                // Responsive Datatable
                $('#responsive-datatable').DataTable();

                // Multi Selection Datatable
                $('#selection-datatable').DataTable({
                    select: {
                        style: 'multi'
                    }
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

            $(function() {
                $('#datatable-buttons').DataTable({

                processing: true,
                serverSide: true,
                ajax: '{{ url('record-list') }}',
                columns: [
                        { data: 'valuation_code', name: 'valuation_code' },
                        { data: 'owner_name', name: 'owner_name' },
                        { data: 'house_number', name: 'house_number' },
                        { data: 'contact', name: 'contact' },
                        { data: 'suburb', name: 'suburb' },
                        { data: 'action', name: 'action' },

                        ]
                 });
            });

             $(document).on('click', '.edit', function(){

                var id = $(this).attr('id');
                $('#form_result').html('');
                $.ajax({
                url :"/records/"+id+"/edit",
                dataType:"json",
                success:function(data)
                {
                    //console.log(data);
                    $('#valuation_code').val(data.result.valuation_code);
                    $('#owner_name').val(data.result.owner_name);
                    $('#house_number').val(data.result.house_number);
                    $('#contact').val(data.result.contact);
                    //$('#suburb').val(data.result.suburb);

                    $('#hidden_id').val(id);

                    $('.modal-title').text('Edit Record');

                    $('.edit-record-modal').modal('show');
                }
                })
          });


$('#record_update_form').on('submit', function(event){
  event.preventDefault();


  $.ajax({
    url:'{{ url('records/update') }}',
    method:"PUT",
    data: $(this).serialize(),
    dataType:"json",
    success:function(data)
    {
    var html = '';
    if(data.errors)
    {
     html = '<div class="alert alert-danger">';
     for(var count = 0; count < data.errors.length; count++)
     {
      html += '<p>' + data.errors[count] + '</p>';
     }
     html += '</div>';
    }
    if(data.success)
    {
     html = '<div class="alert alert-success">' + data.success + '</div>';
     $('#record_update_form')[0].reset();
     $('#datatable-buttons').DataTable().ajax.reload();
     $('.edit-record-modal').modal('hide');
    }
    $('#form_result').html(html);
   }
  });
 });

 //**************************BILLS******************************

            $(function() {
                $('#datatable-table').DataTable({
                keys: true,

                processing: true,
                serverSide: true,
                ajax: '{{ url('record-list') }}',
                columns: [
                        { data: 'valuation_code', name: 'valuation_code'},
                        { data: 'owner_name', name: 'owner_name', render:function(data, type, row){
                            return "<a href='/bill-account/"+ row.valuation_code +"'>" + row.owner_name + "</a>"
                        }},
                        { data: 'contact', name: 'contact' },


                        ]
                 });
            });

 //**************************COLLECTORS******************************
            $(function() {
                $('#collectors-datatable').DataTable({

                processing: true,
                serverSide: true,
                ajax: '{{ url('collector-list') }}',
                columns: [
                        { data: 'name', name: 'name' },
                        { data: 'username', name: 'username' },
                        { data: 'contact', name: 'contact' },
                        { data: 'suburb', name: 'suburb' },
                        { data: 'house_number', name: 'house_number' },
                        { data: 'action', name: 'action' },

                        ]
                 });
            });


            function editCollector(id) {

                $.ajax({
                url :"/collector-edit/"+id,
                success:function(data)
                {
                    //$('#hidden_id').val(id);

                    $('#collector-modal-edit-body').html(data);


                     $('.edit-collector-modal').modal('show');
                }
                })
            }

            function deleteRevenueType(id){

              $.ajax({
                    type:"POST",
                    url :"/collector-revenue-delete/",
                    data: {revenueTypeID:id},
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data)
                    {
                        if(data=="OK"){
                            $("#revCol"+id).hide();
                        }
                    }
                })

            }


            function showRevenueType() {
                $("#RevenueTypeDiv").css('visibility','visible')
            }

            //UPDATE COLLECTOR
           /* $(document).ready(function(e) {

            $('#collector_update_form').on('submit', function(event){
              event.preventDefault();

              $.ajax({
                    type:"POST",
                    url :"/update-collector/",
                    data: new FormData(this),
                    contentType: false,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function(data)
                    {
                        if(data=="OK"){

                            html = '<div class="alert alert-success">Changes Saved</div>';
                            $('#form_result').html(html);

                            $('#collectors-datatable').DataTable().ajax.reload();

                            $('.edit-collector-modal').modal('hide');

                        }
                    }
                })

             });

        }); */


     function deleteStatus(){

        var confirms= confirm('Are you sure you want perform this action.This action can not undo if you proceed');

        if(confirm){
            return true;
        }else{
            return false;
        }

     }




    $('.datepicker1').datepicker({
        uiLibrary: 'bootstrap4',
        format:'yyyy-mm-dd'
    });


    $('.datepicker2').datepicker({
        uiLibrary: 'bootstrap4',
        format:'yyyy-mm-dd'

    });

</script>



</body>


</html>
