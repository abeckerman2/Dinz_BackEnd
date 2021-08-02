<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('title')</title>

  <!-- Custom fonts for this template-->
  <link rel="icon" href="{{url('public/admin/img/favicon.png')}}" sizes="16x16" type="images/png">
<link href="{{url('public/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('public/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/style.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
  <link href="{{url('public/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  @include('admin.include.sidebar')