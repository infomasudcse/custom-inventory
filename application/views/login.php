
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">

        <title>Login</title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="cover.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="<?php echo base_url(); ?>js/ie-emulation-modes-warning.js"></script>

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="<?php echo base_url(); ?>js/ie10-viewport-bug-workaround.js"></script>

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            /*
     * Globals
     */

            /* Links */
            a,
            a:focus,
            a:hover {
                color: #fff;
            }

            /* Custom default button */
            .btn-default,
            .btn-default:hover,
            .btn-default:focus {
                color: #333;
                text-shadow: none; /* Prevent inheritence from `body` */
                background-color: #fff;
                border: 1px solid #fff;
            }


            /*
             * Base structure
             */

            html,
            body {
                height: 100%;
                background-color: #333;
            }
            body {
                color: #fff;
                text-align: center;
                text-shadow: 0 1px 3px rgba(0,0,0,.5);
            }

            /* Extra markup and styles for table-esque vertical and horizontal centering */
            .site-wrapper {
                display: table;
                width: 100%;
                height: 100%; /* For at least Firefox */
                min-height: 100%;
                -webkit-box-shadow: inset 0 0 100px rgba(0,0,0,.5);
                box-shadow: inset 0 0 100px rgba(0,0,0,.5);
            }
            .site-wrapper-inner {
                display: table-cell;
                vertical-align: top;
            }
            .cover-container {
                margin-right: auto;
                margin-left: auto;
            }

            /* Padding for spacing */
            .inner {
                padding: 20px;
            }




            /*
             * Cover
             */

            .cover {
                padding: 0 20px;
            }
            .cover .btn-lg {
                padding: 10px 20px;
                font-weight: bold;
            }


            /*
             * Footer
             */

            .mastfoot {
                color: #999; /* IE8 proofing */
                color: rgba(255,255,255,.5);
            }


            /*
             * Affix and center
             */

            @media (min-width: 768px) {
                /* Pull out the header and footer */
                .masthead {
                    position: fixed;
                    top: 0;
                }
                .mastfoot {
                    position: fixed;
                    bottom: 0;
                }
                /* Start the vertical centering */
                .site-wrapper-inner {
                    vertical-align: middle;
                }
                /* Handle the widths */
                .masthead,
                .mastfoot,
                .cover-container {
                    width: 100%; /* Must be percentage or pixels for horizontal alignment */
                }
            }

            @media (min-width: 992px) {
                .masthead,
                .mastfoot,
                .cover-container {
                    width: 700px;
                }
            }
        </style>
    </head>

    <body>

        <div class="site-wrapper">

            <div class="site-wrapper-inner">

                <div class="cover-container">
                    <img src="<?php echo base_url(); ?>img/logo.png" width="150">
                    <h2 class="text-info text-center">Megal Accounts </h2><br/>

                    <div class="inner cover">
                     
                        <?php echo form_open('login/username_check', array('meethod'=> 'post', 'class'=> 'form-horizontal',  'role'=>'form' )); ?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-6">
                                    <input type="text" name="username" class="form-control" id="inputEmail3"  placeholder="username" required autofocus>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-6">
                                    
                                        <label>
                                            <input type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-3">
                                    <button type="submit" class="btn btn-warning btn-block">Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="mastfoot">
                        
                        
                        
                        <div class="row" id="notify">
                        <?php $str = $this->session->userdata('msg');
                            if($str != ''){
                                if($str == 'ok')                            
                                     echo ' <div class="alert alert-success bcg" role="alert">Successfully Done ! </div>';
                                elseif($str == 'no')
                                    echo ' <div class="alert alert-danger bcr" role="alert">Something wrong !</div>';
                                else {
                                    echo ' <div class="alert alert-warning bcg" role="alert">'.$str.'</div>';
                                }
                                $this->session->unset_userdata('msg');
                            }
                           ?>     
                    </div>
                        <div class="inner">
                            <p>Developed by  <a href="http://refineitbd.com" target='_blank'><img src="<?php echo base_url(); ?>refine_logo5.png" width="20px"></a></p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/docs.min.js"></script>
    </body>
</html>
