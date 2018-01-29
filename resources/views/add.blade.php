<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agence Immobilier</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/AdminLTE.min.css">

    <link rel="stylesheet" href="/css/dataTables.bootstrap.min.css">

    <link rel="stylesheet" href="/css/skin-blue.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href={{url ("/pp/home")}} class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Immo</b>KHALLFALLAH</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sign Out -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <!-- Sign Out -->
                        <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-toggle" data-toggle="dropdown">
                            Log Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menu</li>
                <!-- Optionally, you can add icons to the links -->
                <li><a href="{{ url ('/')}}"><i class="fa fa-link"></i> <span>Welcome</span></a></li>
                <li><a href="{{ url ('pp/home')}}"><i class="fa fa-link"></i> <span>Acceuil</span></a></li>
                <li><a href="{{ url ('pp/link') }}"><i class="fa fa-link"></i> <span>Ajouter Nouveau</span></a></li>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">


            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"> Ajouter Nouveau Immobilier</h3>
                </div>

                <form method="post" action="/pp/create" enctype='multipart/form-data'>
                    {{csrf_field()}}
                    <div class="box-body">
                        <!-- Description-->
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="3" name="desc"></textarea>
                        </div>
                        <!-- Nombre de piece-->
                        <div class="form-group">
                            <label>Selectionner le Nombre de Piece</label>
                            <select class="form-control" name="nbpiece">
                                <option value="">-- Nombre de piece --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>

                            </select>
                        </div>
                        <!-- Etat-->
                        <div class="form-group">
                            <label>Selectionner l'etat de l'immobilier</label>
                            <select class="form-control show-tick" name="etat">
                                <option value="">-- Etat --</option>
                                <option value="En Construction">En construction</option>
                                <option value="En finissant">En finition</option>
                                <option value="Fini">fini</option>
                            </select>
                        </div>
                        <!-- Region-->
                        <div class="form-group">
                            <label>Selects Region</label>
                            <select class="form-control" name="gouv">
                                <option value="">-- Région --</option>
                                <option value="Ariana">Ariana</option>
                                <option value="Béja">Béja</option>
                                <option value="Ben Arous">Ben Arous</option>
                                <option value="Bizerte">Bizerte</option>
                                <option value="Gabès">Gabès</option>
                                <option value="Gafsa">Gafsa</option>
                                <option value="Jendouba">Jendouba</option>
                                <option value="Kairouan">Kairouan</option>
                                <option value="Kasserine">Kasserine</option>
                                <option value="Kébili">Kébili</option>
                                <option value="Le Kef">Le Kef</option>
                                <option value="Mahdia">Mahdia</option>
                                <option value="La Manouba">La Manouba</option>
                                <option value="Médenine">Médenine</option>
                                <option value="Monastir">Monastir</option>
                                <option value="Nabeul">Nabeul</option>
                                <option value="Sfax">Sfax</option>
                                <option value="Sidi Bouzid">Sidi Bouzid</option>
                                <option value="Siliana">Siliana</option>
                                <option value="Sousse">Sousse</option>
                                <option value="Tataouine">Tataouine</option>
                                <option value="Tozeur">Tozeur</option>
                                <option value="Tunis">Tunis</option>
                                <option value="Zaghouan">Zaghouan</option>
                            </select>
                        </div>
                        <!-- ville-->
                        <div class="form-group">
                            <label>Ville</label>
                            <input class="form-control" name="ville" placeholder="Enter text">
                        </div>
                        <!-- Rue-->
                        <div class="form-group">
                            <label>Rue</label>
                            <input class="form-control" name="rue" placeholder="Enter text">
                        </div>
                        <!-- images-->
                        <div class="form-group">
                            <label>File input</label>
                            <input name="image[]" type="file" multiple  id="BSbtnsuccess" />
                        </div>
                        <input style="margin-left:800px " type="submit" class="btn btn-primary btn-lg m-l-15 " value="Ajouter" name="btnadd">
                        <button type="reset" class="btn btn-default">Reset Button</button>
                    </div>
                </form>
            </div>

        </section>




    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">

        <!-- Default to the left -->
        <strong>Copyright &copy; 2018 <a href="#">Orama TN</a>.</strong> All rights reserved.
    </footer>

</div>

<script src="/js/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.min.js"></script>


</body>
</html>
