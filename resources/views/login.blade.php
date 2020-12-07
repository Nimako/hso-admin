<!doctype html>
<html lang="en">


<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Cedi Pay, Mobile Money, Online Payment">
  <meta name="author" content="Cedi Pay">

  <!-- App Favicon -->
  <link rel="shortcut icon" href="{{ asset('lib/assets/images/favicon.ico')}}">

  <!-- App title -->
  <title>Cedi Pay</title>

  <!-- Bootstrap CSS -->
  <link href="{{ asset('lib/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

  <!-- App CSS -->
  <link href="{{ asset('lib/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

  <!-- Modernizr js -->
  <script src="{{ asset('lib/assets/js/modernizr.min.js')}}"></script>

  <style>
    .account-pages {
      background: green;
    }
  </style>

</head>


<body>

  <div class="account-pages"></div>
  <div class="clearfix"></div>
  <div class="wrapper-page">

    <div class="account-bg">
      <div class="card-box mb-0" style="border:none">
        <div class="text-center m-t-20">
          <!--<img src="{{ asset('lib/assets/images/logo.jpg') }}" width="90">-->
           <h3 style="color:seagreen"> HISENSE GHANA</h3>
        </div>
        <div class="m-t-10 p-20">
          <div class="row">
            <div class="col-12 text-center">
              <h6 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h6>
            </div>
          </div>

             <form action="{{url('post-login')}}" method="POST" id="logForm">

                     @if ($message = Session::get('success'))
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                        </div>
                     @endif

                 {{ csrf_field() }}

                <div class="form-label-group">
                  <input type="email" name="email" autocomplete="off" id="inputEmail" class="form-control" placeholder="Email address" >

                  @if ($errors->has('email'))
                  <span class="error">{{ $errors->first('email') }}</span>
                  @endif
                </div><br>


               <div class="form-label-group">
                  <input type="password" name="password" autocomplete="off" id="inputPassword" class="form-control" placeholder="Password">

                  @if ($errors->has('password'))
                  <span class="error">{{ $errors->first('password') }}</span>
                  @endif

                </div><br>

                <button class="btn btn-lg btn-success btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign In</button>
              </form>


          </form>

        </div>

        <div class="clearfix"></div>
      </div>
    </div>
    <!-- end card-box-->


  </div>
  <!-- end wrapper page -->




  <!-- jQuery  -->
  <script src="{{ asset('lib/assets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('lib/assets/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('lib/assets/js/detect.js')}}"></script>
  <script src="{{ asset('lib/assets/js/waves.js')}}"></script>
  <script src="{{ asset('lib/assets/js/jquery.nicescroll.js')}}"></script>
  <script src="{{ asset('lib/assets/plugins/switchery/switchery.min.js')}}"></script>

  <!-- App js -->
  <script src="{{ asset('lib/assets/js/jquery.core.js')}}"></script>
  <script src="{{ asset('lib/assets/js/jquery.app.js')}}"></script>

</body>


</html>





