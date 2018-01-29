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

    <style>
        div.gallery {
            margin: 5px;
            border: 1px solid #ccc;
            float: left;
            width: 180px;
        }

        div.gallery:hover {
            border: 1px solid #777;
        }

        div.gallery img {
            width: 100%;
            height: auto;
        }

        div.desc {
            padding: 15px;
            text-align: center;
        }
    </style>
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
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Tous les immeubles </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Description</th>
                            <th>Nombre de Piece</th>
                            <th>Etat</th>
                            <th>Region</th>
                            <th>Ville</th>
                            <th>Rue</th>
                            <th>Photos</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->desc}}</td>
                                <td>{{$item->nbpiece}}</td>
                                <td>{{$item->etat}}</td>
                                <td>{{$item->gouv}}</td>
                                <td>{{$item->ville}}</td>
                                <td>{{$item->rue}}</td>
                                <td>
                                    <button class="btn btn-primary"  data-target="#plus{{$item->id}}" data-toggle='modal' id="{{$item->id}}">Photos</button>
                                </td>
                                <div id="plus{{$item->id}}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <!-- Modal content -->
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color:#4988c5">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Details</h4>
                                            </div>
                                            <div class="modal-body">


                                                @foreach($item->photos as $photo)
                                                    <form action="/pp/del/{{$photo->id}}" method="get">
                                                            <img src="/uploads/{{$photo->nomphoto}}" width="75%" height="25%" />
                                                    <input class="btn btn-danger" type="submit" value="supprimer" />
                                                </form>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <td> <button class="btn btn-primary" data-target="#edit" data-toggle='modal'
                                            data-home-id='<?php echo $item->id; ?>'
                                            data-home-etat='<?php echo $item->etat; ?>'
                                            data-home-desc='<?php echo $item->desc; ?>'
                                            data-home-nb='<?php echo $item->nbpiece; ?>'
                                            data-home-gouv='<?php echo $item->gouv;?>'
                                            data-home-ville='<?php echo $item->ville;?>'
                                            data-home-rue='<?php echo $item->rue;?>'
                                            id="updateButton" >Editer</button>
                                </td>

                                <td> <button
                                            data-target="#supp" data-toggle="modal"
                                            data-home-id='<?php echo $item->id;?>'
                                            id="deleteButton" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- modal1 modification-->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#4988c5">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Modifier Immeublier</h4>
                        </div>
                        <div class="modal-body">
                            <form  method="post" action="/pp/edit" enctype='multipart/form-data' >
                                {{csrf_field()}}
                                <label>Description</label>
                                <div class="form-line">
                                    <textarea  type="text" name="desc" value="{$desc}"  class="form-control no-resize"></textarea>
                                </div>
                                <br>
                                <label>Etat</label>
                                <div class="form-line">
                                    <select class="form-control show-tick" name="etat">
                                        <option value="">-- Etat --</option>
                                        <option value="En Construction" selected="selected">En construction</option>
                                        <option value="En finissant">En finition</option>
                                        <option value="Fini">fini</option>
                                    </select>
                                </div>
                                <br>
                                <label>Nombre de piece</label>
                                <div class="form-line">
                                    <select class="form-control"  name="nb">
                                        <option value="">-- Nombre de piece --</option>
                                        <option value="1" selected="selected">1</option>
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
                                <br>
                                <label>Gouvernaurat</label>
                                <div class="form-line">
                                    <select class="form-control" name="gouv">
                                        <option value="">-- Région --</option>
                                        <option value="Ariana" selected="selected">Ariana</option>
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
                                    </select>                                    </div>
                                <br>
                                <label>Ville</label>
                                <div class="form-line">
                                    <textarea rows="2" name="ville" value="{$ville}" class="form-control no-resize" ></textarea>
                                </div>
                                <br>
                                <label>Rue</label>
                                <div class="form-line">
                                    <textarea rows="2" name="rue" value="{$rue}" class="form-control no-resize" ></textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>File input</label>
                                    <input name="images[]" type="file" multiple  id="BSbtnsuccess" />
                                </div>
                                <br>
                                <input type="text" name="idhome"  value=""  hidden/>
                                <div class="modal-footer remove-top">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit"  class="btn btn-primary " id="updateButtonConfirm" name="update">Enregistrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin modal1 modification-->
            <!-- modal1 suppression-->
            <div id="supp" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#c53430">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h3 class="modal-title">Confirmer votre suppression !</h3>
                        </div>
                        <div class="modal-body">
                            <h4> Voulez vous supprimer cette Immeuble ?</h4>
                            <form method="post" action="/pp/delete">
                                {{csrf_field()}}
                                <input type="text" name="id"  value="" hidden  />
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
                                    <button   type="submit" id="deleteButtonConfirm" class="btn btn-danger"  name="oui" >Oui</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin modal suppression-->
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
<!-- DataTables -->
<script src="/js/jquery.dataTables.min.js"></script>
<script src="/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/js/fastclick.js"></script>
<script>
    $(function () {
        $('#example1').DataTable()
    });
    $('#supp').on('show.bs.modal', function(e) {

        var id = $(e.relatedTarget).data('home-id');
        $(e.currentTarget).find('input[name="id"]').val(id);
    });
    $('#edit').on('show.bs.modal', function(e) {
        var id= $(e.relatedTarget).data('home-id');
        $(e.currentTarget).find('input[name="idhome"]').val(id);
    });
    $('#edit').on('show.bs.modal', function(e) {
        var des = $(e.relatedTarget).data('home-desc');
        $(e.currentTarget).find('textarea[name="desc"]').val(des);
    });
    $('#edit').on('show.bs.modal', function(e) {
        var reg = $(e.relatedTarget).data('home-gouv');
        $(e.currentTarget).find('textarea[name="gouv"]').val(reg);
    });
    $('#edit').on('show.bs.modal', function(e) {
        var ville = $(e.relatedTarget).data('home-ville');
        $(e.currentTarget).find('textarea[name="ville"]').val(ville);
    });
    $('#edit').on('show.bs.modal', function(e) {
        var rue = $(e.relatedTarget).data('home-rue');
        $(e.currentTarget).find('textarea[name="rue"]').val(rue);
    });
    $('#edit').on('show.bs.modal', function(e) {
        var nb = $(e.relatedTarget).data('home-nb');
        $(e.currentTarget).find('textarea[name="nb"]').val(nb);
    });
    $('#edit').on('show.bs.modal', function(e) {
        var etat = $(e.relatedTarget).data('home-etat');
        $(e.currentTarget).find('select[name="etat"]').append(etat);
    });
</script>

</body>
</html>
