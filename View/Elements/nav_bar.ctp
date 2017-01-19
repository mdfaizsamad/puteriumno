<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style='margin:0px 0px 0px 0px;padding:0px 0px 0px 0px;'><img src='<?php echo Router::url('/img/logo.png') ?>' /></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="hidden-xs hidden-sm"><button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle">
                        <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                    </button></li>
                <li class="dropdown notifications hidden-xs hidden-sm">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>

                    </a>
                    <ul class="dropdown-menu">
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object thumb" src="images/people/50/guy-2.jpg" alt="people">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="pull-right">
                                    <span class="label label-default">5 min</span>
                                </div>
                                <h5 class="media-heading">Adrian D.</h5>

                                <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object thumb" src="images/people/50/woman-7.jpg" alt="people">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="pull-right">
                                    <span class="label label-default">2 days</span>
                                </div>
                                <h5 class="media-heading">Jane B.</h5>
                                <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object thumb" src="images/people/50/guy-8.jpg" alt="people">
                                </a>
                            </div>

                            <div class="media-body">
                                <div class="pull-right">
                                    <span class="label label-default">3 days</span>
                                </div>
                                <h5 class="media-heading">Andrew M.</h5>
                                <p class="margin-none">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </div>
                        </li>
                    </ul>
                </li>

                <li><a href="#">Link</a></li>
                <li class="dropdown hidden-xs hidden-sm">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav pull-right navbar-nav hidden-xs hidden-sm">
                <li><a href="<?php echo Router::url('/users/login') ?>">Sign In</a></li>
                <li><a href="<?php echo Router::url('/signup') ?>">Sign Up</a></li>
                <li class="divider-vertical"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Username <span class="caret"></span></a>
                    <ul class="dropdown-menu" style="left: inherit;right: 0px;">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
