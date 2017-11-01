<?php
    include_once("dist/bin/webservice.php");
    
    if(isset($_REQUEST['btn_login'])){
        $username = $_REQUEST['login_email'];
        $password = $_REQUEST['login_pass'];
        login_account($username,$password);
    }
?>
    <!DOCTYPE HTML>
    <html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <script src="dist/lib/jquery-3.2.1.min.js"></script>
        <script src="dist/bin/bridge.js"></script>
        <script src="dist/lib/jquery.fittext.js"></script>

        <!--menuggwp-->
        <link rel="stylesheet" type="text/css" href="dist/lib/menu-ggwp/css/default.css" />
        <link rel="stylesheet" type="text/css" href="dist/lib/menu-ggwp/css/component.css" />
        <script src="dist/lib/menu-ggwp/js/modernizr.custom.js"></script>
        <!--menuggwp-->
        
        <!--footer-->
        <link rel="stylesheet" type="text/css" href="dist/lib/footer/demo.css" />
        <link rel="stylesheet" type="text/css" href="dist/lib/footer/footer.css" />
        <!--footer-->

        <link rel="stylesheet" href="dist/lib/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="dist/logreg.css" />
    </head>

    <body>
        <div class="container-fluid navi-bar">
            <div class="row">
                <!--******************Menu Button Mulai******************-->
                <div id="dl-menu" class="dl-menuwrapper ontop1" style="float:left;">
                    <button class="dl-trigger" style="background-color:#2e7d32;">Open Menu</button>
                    <ul class="dl-menu" style="background-color:#2e7d32;">
                        <li>
                            <a href="logreg.php"><i class="fa-user-circle-o icon" style="margin-right: 1em;color:white;"></i>Masuk</a>
                        </li>
                        <li>
                            <a href="register.php"><i class="fa-pencil icon" style="margin-right: 1em;color:white;"></i>Daftar</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa-smile-o icon" style="margin-right: 1em;color:white;"></i>Tentang Kami</a>
                        </li>
                    </ul>
                </div>
                <!--******************Menu Button Selesai******************-->
                
                <div class="logontitle">
                    <img src="img/9gag.png" class="logo">
                    <label class="title">Tempatnya jual beli barang bekas</label>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="margin-top:3em;">
            <div class="row">
                <div class="col-lg-offset-2 col-md-offset-2 col-xs-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-xs-8 col-sm-8 container">
                    <div>
                        <Center>
                            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" id="tagline">Login</div>
                        </Center>
                    </div>

                    <form method="post" action="#" id="form_data" autocomplete="on">

                        <center>
                            <i class="icon fa-user iconinput"></i>
                            <!--Tulisan disebelahnya ikon login-->
                            <input type="text" name="login_email" id="login_email" value="" autocorrect="off" placeholder="Email Anda" maxlength="50" onblur="checkfield(this.id,5)" />
                            <i class="icon fa-warning textvalidator" id="validatoremail"></i>
                            <!--Tulisan validasi disebelahnya ikon warning-->
                        </center>

                        <center>
                            <i class="icon fa-lock iconinput"></i>
                            <!--Tulisan disebelahnya ikon password-->
                            <input type="password" name="login_pass" id="login_pass" value="" placeholder="Password Anda" maxlength="50" onblur="checkfield(this.id,5)" />
                            <i class="icon fa-warning textvalidator" id="validatorpassword"></i>
                            <!--Tulisan validasi disebelahnya ikon warning-->
                        </center>

                        <input class="button btnlogin" type="submit" class="alt" id="btn_login" name="btn_login" value="Log In" />

                        <div id="txt_fpass">
                            Lupa sandi?
                            <a onclick="slide('register','up')" class="txt_fpass2">Klik disini untuk pemulihan sandi</a>
                        </div>

                        <hr>
                    </form>

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="text-align:center;margin-top:-1.5em;">
                        Belum memiliki akun?
                    </div>

                    <input class="button" type="button" class="alt" value="Daftar" style="margin-bottom:0.5em;" onclick="window.location='register.php'" />
                </div>
            </div>
        </div>
        
        <!--******************Footer Mulai******************-->
        <footer class="footer-distributed">
            <div class="footer-left">
                <h3>Sumting<span>Sumting</span></h3>

                <p class="footer-links">
                    <a href="#">Home</a> ·
                    <a href="#">Blog</a> ·
                    <a href="#">Pricing</a> ·
                    <a href="#">About</a> ·
                    <a href="#">Faq</a> ·
                    <a href="#">Contact</a>
                </p>

                <p class="footer-company-name">Sumting &copy; 2017</p>
            </div>

            <div class="footer-center">
                <div>
                    <i class="fa fa-map-marker"></i>
                    <p><span>Jln. Ngagel Jaya Tengah No.121</span> Surabaya, Jawa Timur</p>
                </div>

                <div>
                    <i class="fa fa-phone"></i>
                    <p>0822 3466 2863</p>
                </div>

                <div>
                    <i class="fa fa-envelope"></i>
                    <p><a href="mailto:support@company.com">sumting@gmail.com</a></p>
                </div>
            </div>

            <div class="footer-right">
                <p class="footer-company-about">
                    <span>Tentang Perusahaan</span> Sumting menawarkan kemudahan dalam menjual barang-barang milik anda, iklankan barang anda dan atur jadwal temu dengan orang yang berminat dengan barang yang anda iklankan.
                </p>

                <div class="footer-icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                </div>
            </div>
        </footer>
        <!--******************Footer Selesai******************-->

        <script src="dist/lib/menu-ggwp/js/jquery.dlmenu.js"></script>
        <script>
            $(function() {
                $('#dl-menu').dlmenu({
                    animationClasses: {
                        classin: 'dl-animate-in-2',
                        classout: 'dl-animate-out-2'
                    }
                });
            });

            $("#txt_fpass").fitText(1, {
                minFontSize: '10px',
                maxFontSize: '15px'
            });

            $("#btnlogreg").fitText();

            $("#title").fitText(1, {
                minFontSize: '10px',
                maxFontSize: '50px'
            });

            $("#tagline").fitText(1, {
                minFontSize: '10px',
                maxFontSize: '50px'
            });

        </script>
    </body>

    </html>
