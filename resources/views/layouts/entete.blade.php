
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">

    <title>@if (isset($Title))
        {{$Title}}
    @endif</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" class="rel">
    <link href="{{asset('css/default.css')}}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('css/notify.css')}}">
    <link rel="stylesheet" href="{{asset('font/css/all.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}"/>
  <!--<link rel="stylesheet" type="text/css" href="{{asset('dataTables/dataTables.bootstrap.css')}}"/>-->


    <style type="text/css">
    /* ============ desktop view ============ */

    /* ============ desktop view .end// ============ */
  </style>

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
  </head>

  <body>
      <div class="toast-container" aria-live="polite" aria-atomic="true">
          <div class="toast fade hide loader loader-toast py-2" data-autohide="true" data-delay="false" data-type="spinner fa-spin" role="alert" aria-live="assertive" aria-atomic="true">
              <div class="toast-content">
                  <div class="toast-icon">
                      <i class="fa fa-spinner fa-spin fa-2x" ></i>
                      </div>
                    <div class="toast-body">
                        <strong>En cours ..</strong>
                        <div>Veillez patienter SVP.</div>
                    </div>
                </div>
                <!--<button class="close" type="button" data-dismiss="toast" aria-label="Close">
                    <i class="fa fa-times"></i>
                    </button>-->
            </div>
        </div>
