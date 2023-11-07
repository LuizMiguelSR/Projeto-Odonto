@extends('admin.layouts.layoutDashboard')
@section('titulo', 'Dashboard')
@section('conteudo')
    <main>
        <nav class="mnb navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="ic fa fa-bars"></i>
                    </button>
                    <div style="padding: 15px 0;">
                        <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
                    </div>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">En</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Settings</a></li>
                                <li><a href="#">Upgrade</a></li>
                                <li><a href="#">Help</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fa fa-bell-o"></i></a></li>
                        <li><a href="#"><i class="fa fa-comment-o"></i></a></li>
                    </ul>
                    <form class="navbar-form navbar-right">
                        <input type="text" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>
        <!--msb: main sidebar-->
        <div class="msb" id="msb">
            <nav class="navbar navbar-default" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <div class="brand-wrapper">
                        <!-- Brand -->
                        <div class="brand-name-wrapper">
                            <a class="navbar-brand" href="#">
                                ODONTO CLEAN
                            </a>
                        </div>

                    </div>

                </div>

                <!-- Main Menu -->
                <div class="side-menu-container">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li class="active"><a href="#"><i class="fa fa-puzzle-piece"></i> Components</a></li>
                        <li><a href="#"><i class="fa fa-heart"></i> Extras</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-signal"></span> Link</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>
        </div>
        <!--main content wrapper-->
        <div class="mcw">
            <!--navigation here-->
            <!--main content view-->
            <div class="cv">
                <div>
                    <div class="inbox">
                        <div class="inbox-sb">

                        </div>
                        <div class="inbox-bx container-fluid">
                            <div class="row">
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-10">
                                    <table class="table table-stripped mt-2">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th>De:</th>
                                                <th>Assunto</th>
                                                <th>Anexo</th>
                                                <th>Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <td><i class="fa fa-star"></i></td>
                                                <td><b>Mozilla</b></td>
                                                <td><b>In celebration of women and girls everywhere</b></td>
                                                <td></td>
                                                <td>Mar 10</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <td><i class="fa fa-star-o"></i></td>
                                                <td>Dan Glenn</td>
                                                <td>[ptcuser-announcements] - PTC/USER Expert Speaker Series Webinar March 9,
                                                    2017 11AM (EST)</td>
                                                <td><i class="fa fa-paperclip"></i></td>
                                                <td>Mar 10</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <td><i class="fa fa-star-o"></i></td>
                                                <td>Jetpack</td>
                                                <td>Announcing some highly requested improvements and our new affiliate program
                                                </td>
                                                <td></td>
                                                <td>Mar 08</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <td><i class="fa fa-star-o"></i></td>
                                                <td>Jetpack</td>
                                                <td>Announcing some highly requested improvements and our new affiliate program
                                                </td>
                                                <td></td>
                                                <td>Mar 08</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <td><i class="fa fa-star-o"></i></td>
                                                <td>Jetpack</td>
                                                <td>Announcing some highly requested improvements and our new affiliate program
                                                </td>
                                                <td></td>
                                                <td>Mar 08</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <td><i class="fa fa-star-o"></i></td>
                                                <td>Jetpack</td>
                                                <td>Announcing some highly requested improvements and our new affiliate program
                                                </td>
                                                <td></td>
                                                <td>Mar 08</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <td><i class="fa fa-star-o"></i></td>
                                                <td>Jetpack</td>
                                                <td>Announcing some highly requested improvements and our new affiliate program
                                                </td>
                                                <td></td>
                                                <td>Mar 08</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <td><i class="fa fa-star-o"></i></td>
                                                <td>Jetpack</td>
                                                <td>Announcing some highly requested improvements and our new affiliate program
                                                </td>
                                                <td></td>
                                                <td>Mar 08</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            (function(){
                $('#msbo').on('click', function(){
                $('body').toggleClass('msb-x');
                });
            }());
        </script>
    </main>
@endsection
