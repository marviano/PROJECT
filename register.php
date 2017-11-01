<?php
    include_once("dist/bin/webservice.php");

    if(isset($_REQUEST['btn_register'])){
        $password = $_REQUEST['reg_pass'];
        $email = $_REQUEST['reg_email'];
        $confirm = $_REQUEST['reg_confpass'];
        $nama = $_REQUEST['reg_nama'];
        $telp = $_REQUEST['reg_telp'];
        $provinsi = $_REQUEST['hid_prop'];
        $kota = $_REQUEST['hid_kota'];
        $alamat = $_REQUEST['reg_alamat'];
        
        if($password == $confirm){
            $password = md5($password);
            save_account($email,$password,$nama,$telp,$provinsi,$kota,$alamat);
        }else{
            alert("Password dan konfirm password tidak sama");
        }
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


        <div class="container-fluid" style="margin-top:0em;">
            <div class="row">
                <div class="col-lg-offset-2 col-md-offset-2 col-xs-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-8 col-md-8 col-xs-8 col-sm-8 container" style="padding:2em;">
                    <Center>
                        <Center>
                            <h1>Pendaftaran</h1>
                        </Center>

                        <form method="post" action="#" id="form_data" autocomplete="on">
                            <div>
                                <i class="icon fa-user iconinput"></i>
                                <input type="text" name="reg_email" id="reg_email" value="" autocorrect="off" placeholder="Email Anda" maxlength="35" onblur="checkField(this.id,5)" />
                                <i class="icon fa-warning textvalidator" id="validatoremail"></i>
                            </div>

                            <div>
                                <i class="icon fa-lock iconinput"></i>
                                <input type="password" name="reg_pass" id="reg_pass" value="" placeholder="Sandi, 5 - 15 karakter" maxlength="15" onblur="checkField(this.id,5)" />
                                <i class="icon fa-warning textvalidator" id="validatorpassword"></i>
                            </div>

                            <div>
                                <i class="icon fa-key iconinput"></i>
                                <input type="password" name="reg_confpass" id="reg_confpass" value="" placeholder="Konfirmasi Sandi" maxlength="15" onblur="checkConfirmPass()" />
                            </div>

                            <div>
                                <div id="checkpass" class="warning" style="text-align:right;padding-right:10px;">
                                    &nbsp;
                                </div>
                            </div>

                            <div>
                                <i class="icon fa-user iconinput"></i>
                                <input type="text" name="reg_nama" id="reg_nama" value="" autocorrect="off" placeholder="Nama Lengkap" maxlength="50" onblur="checkField(this.id,1)" />
                                <i class="icon fa-warning textvalidator" id="validatornama"></i>
                            </div>

                            <div>
                                <i class="icon fa-phone iconinput"></i>
                                <input type="number" name="reg_telp" id="reg_telp" autocorrect="off" maxlength="20" placeholder="Nomor Handphone" onblur="checkField(this.id,10)" />
                                <i class="icon fa-warning textvalidator" id="validatornohpone"></i>
                            </div>

                            <div>
                                <input id="hid_prop" type="hidden" name="hid_prop" value="" />
                                
                                <i class="icon fa-building iconinput"></i>
                                
                                <select name="reg_prop" id="reg_prop" onchange="ajaxkota(this.value)" style="margin-right:1em;">
                                <option value="" disabled selected>Pilih Provinsi</option>
                                <option value="51">Bali</option>
                                <option value="36">Banten</option>
                                <option value="17">Bengkulu</option>
                                <option value="34">DI Yogyakarta</option>
                                <option value="31">DKI Jakarta</option>
                                <option value="75">Gorontalo</option>
                                <option value="92">Irian Jaya Barat</option>
                                <option value="15">Jambi</option>
                                <option value="32">Jawa Barat</option>
                                <option value="33">Jawa Tengah</option>
                                <option value="35">Jawa Timur</option>
                                <option value="61">Kalimantan Barat</option>
                                <option value="63">Kalimantan Selatan</option>
                                <option value="62">Kalimantan Tengah</option>
                                <option value="64">Kalimantan Timur</option>
                                <option value="19">Kep. Bangka Belitung</option>
                                <option value="21">Kep. Riau</option>
                                <option value="18">Lampung</option>
                                <option value="81">Maluku</option>
                                <option value="82">Maluku Utara</option>
                                <option value="11">Nanggroe Aceh Darussalaam</option>
                                <option value="52">Nusa Tenggara Barat</option>
                                <option value="53">Nusa Tenggara Timur</option>
                                <option value="91">Papua</option>
                                <option value="14">Riau</option>
                                <option value="73">Sulawesi Selatan</option>
                                <option value="72">Sulawesi Tengah</option>
                                <option value="74">Sulawesi Tenggara</option>
                                <option value="71">Sulawesi Utara</option>
                                <option value="13">Sumatra Barat</option>
                                <option value="16">Sumatra Selatan</option>
                                <option value="12">Sumatra Utara</option>
                            </select>
                               
                                <input id="hid_kota" type="hidden" name="hid_kota" value=""/>
                                
                                <i class="icon fa-building-o iconinput"></i>
                                
                                <select name="reg_kota" id="reg_kota" onchange="changeValue('hid_kota','reg_kota')">
                                <option value="" disabled selected>Pilih Kota</option>
                                <option value="52">KOTA BIMA</option>
                                <option value="64">KOTA BONTANG</option>
                                <option value="13">KOTA BUKIT TINGGI </option>
                                <option value="36">KOTA CILEGON</option>
                                <option value="36">KOTA CILEGON</option>
                                <option value="16">KOTA LUBUK LINGGAU</option>
                                <option value="16">KOTA PRABUMULIH</option>
                                <option value="92">KOTA SORONG </option>
                                <option value="91">KOTA SORONG </option>
                                <option value="64">KOTA TARAKAN</option>
                                <option value="81">KOTA AMBON</option>
                                <option value="64">KOTA BALIKPAPAN</option>
                                <option value="11">KOTA BANDA ACEH</option>
                                <option value="18">KOTA BANDAR LAMPUNG</option>
                                <option value="32">KOTA BANDUNG</option>
                                <option value="32">KOTA BANJAR</option>
                                <option value="63">KOTA BANJAR BARU</option>
                                <option value="63">KOTA BANJARMASIN</option>
                                <option value="21">KOTA BATAM</option>
                                <option value="35">KOTA BATU</option>
                                <option value="74">KOTA BAU BAU</option>
                                <option value="32">KOTA BEKASI</option>
                                <option value="17">KOTA BENGKULU</option>
                                <option value="12">KOTA BINJAI</option>
                                <option value="71">KOTA BITUNG</option>
                                <option value="35">KOTA BLITAR</option>
                                <option value="32">KOTA BOGOR</option>
                                <option value="32">KOTA CIMAHI</option>
                                <option value="32">KOTA CIREBON</option>
                                <option value="51">KOTA DENPASAR</option>
                                <option value="32">KOTA DEPOK</option>
                                <option value="14">KOTA DUMAI</option>
                                <option value="75">KOTA GORONTALO</option>
                                <option value="31">KOTA JAKARTA BARAT</option>
                                <option value="31">KOTA JAKARTA PUSAT</option>
                                <option value="31">KOTA JAKARTA SELATAN</option>
                                <option value="31">KOTA JAKARTA TIMUR</option>
                                <option value="31">KOTA JAKARTA UTARA</option>
                                <option value="15">KOTA JAMBI</option>
                                <option value="91">KOTA JAYAPURA</option>
                                <option value="35">KOTA KEDIRI</option>
                                <option value="74">KOTA KENDARI</option>
                                <option value="53">KOTA KUPANG</option>
                                <option value="11">KOTA LANGSA</option>
                                <option value="11">KOTA LHOKSEUMAWE</option>
                                <option value="35">KOTA MADIUN</option>
                                <option value="33">KOTA MAGELANG</option>
                                <option value="35">KOTA MALANG</option>
                                <option value="71">KOTA MANADO</option>
                                <option value="52">KOTA MATARAM</option>
                                <option value="12">KOTA MEDAN</option>
                                <option value="18">KOTA METRO</option>
                                <option value="35">KOTA MOJOKERTO</option>
                                <option value="13">KOTA PADANG</option>
                                <option value="13">KOTA PADANG PANJANG</option>
                                <option value="12">KOTA PADANG SIDIMPUAN</option>
                                <option value="16">KOTA PAGAR ALAM </option>
                                <option value="62">KOTA PALANGKARAYA</option>
                                <option value="16">KOTA PALEMBANG</option>
                                <option value="72">KOTA PALU</option>
                                <option value="19">KOTA PANGKALPINANG</option>
                                <option value="13">KOTA PARIAMAN</option>
                                <option value="35">KOTA PASURUAN</option>
                                <option value="13">KOTA PAYAKUMBUH</option>
                                <option value="33">KOTA PEKALONGAN</option>
                                <option value="14">KOTA PEKANBARU</option>
                                <option value="12">KOTA PEMATANG SIANTAR</option>
                                <option value="61">KOTA PONTIANAK</option>
                                <option value="35">KOTA PROBOLINGGO</option>
                                <option value="11">KOTA SABANG</option>
                                <option value="33">KOTA SALATIGA</option>
                                <option value="64">KOTA SAMARINDA</option>
                                <option value="13">KOTA SAWAHLUNTO</option>
                                <option value="33">KOTA SEMARANG</option>
                                <option value="12">KOTA SIBOLGA</option>
                                <option value="61">KOTA SINGKAWANG</option>
                                <option value="13">KOTA SOLOK</option>
                                <option value="32">KOTA SUKABUMI</option>
                                <option value="35">KOTA SURABAYA</option>
                                <option value="33">KOTA SURAKARTA</option>
                                <option value="36">KOTA TANGGERANG</option>
                                <option value="36">KOTA TANGGERANG</option>
                                <option value="12">KOTA TANJUNG BALAI</option>
                                <option value="21">KOTA TANJUNG PINANG</option>
                                <option value="32">KOTA TASIKMALAYA</option>
                                <option value="12">KOTA TEBING TINGGI</option>
                                <option value="33">KOTA TEGAL</option>
                                <option value="82">KOTA TERNATE</option>
                                <option value="82">KOTA TIDORE KEPULAUAN</option>
                                <option value="71">KOTA TOMOHON</option>
                                <option value="34">KOTA YOGYAKARTA</option>
                            </select>
                            </div>

                            <div>
                                <i class="icon fa-map-signs iconinput"></i>
                                <input type="text" name="reg_alamat" id="reg_alamat" value="" autocorrect="off" placeholder="Alamat" maxlength="100" onblur="checkField(this.id,1)" />
                                <i class="icon fa-warning textvalidator" id="validatornama"></i>
                            </div>

                            <!--
                            <div class="warning">
                                <i class="icon fa-warning"></i> Kode verifikasi akan disms ke nomor yang didaftarkan. Pastikan nomor dapat dihubungi.
                            </div>
-->
                            <br>
                            <input type="submit" class="button btnlogin" id="btn_submit_data" value="Daftarkan" name="btn_register" />
                        </form>
                    </Center>
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
    </body>

    </html>


    <!-- Scripts -->
    <script src="dist/lib/menu-ggwp/js/jquery.dlmenu.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#dl-menu').dlmenu({
                animationClasses: {
                    classin: 'dl-animate-in-2',
                    classout: 'dl-animate-out-2'
                }
            });
        });
        //    var validasiinsert = false;
        //    var datenow = yyyy + mm + dd;
        //
        //    $(function() {
        //        datenow = yyyy + mm + dd;
        //
        //        getSelectOption("Master_Kota/selectDataOption", "kota", webservicename);
        //
        //        $('#email').on('keypress', function(e) {
        //            if (e.which == 32)
        //                return false;
        //        });
        //        $('#email').on('keyup', function(e) {
        //            var email = $("#email").val();
        //            $("#email").val(email.replace(" ", ""));
        //        });
        //    });
        //
        //    function showdaftarkan() {
        //        setTimeout(function() {
        //            if (validasiinsert == true) {
        //                if ($("#nama").val() != "") {
        //                    //						if($("#nohpone").val() != ""){
        //                    if ($('#termcond').is(':checked')) {
        //
        //                        showSpinnerProcess("SPINNER", false, "Diminoni", "Mevalidasi data referral...");
        //
        //                        var postName = "Customer/insertData";
        //                        var dataString = {
        //                            data_username: $("#referral").val()
        //                        };
        //                        getAjaxPost(postName, dataString, result_success_validasireferralPOPUP, result_fail_validasireferral);
        //                    } else {
        //                        toastmessage("Anda belum menyetujui persyaratan dan kondisi yang kami berikan");
        //                        //							}				
        //                        //						}else{
        //                        //							toastmessage("Nomor HP harus diisi");
        //                        //						}
        //                        //					}else{
        //                        //						toastmessage("Referral harus diisi");
        //                        //					}
        //                    }
        //                } else {
        //                    toastmessage("Anda belum mengisi nama anda");
        //                }
        //            }
        //        }, 500);
        //    }
        //
        //    function result_success_validasireferralPOPUP(data) {
        //        if (data == "") {
        //            toastmessage("Username untuk referral tidak ditemukan");
        //            cordova.plugin.pDialog.dismiss();
        //            $("#referral").val("");
        //            $("#referral").focus();
        //        } else {
        //            var obj = convertJSON(data)[0];
        //
        //            if (obj.nomor != undefined && obj.nomor != null) {
        //                navigator.notification.confirm(
        //                    'Apakah anda yakin menggunakan no hp ' + $("#nohpone").val() + ' sebagai username anda? Kode validasi akan dikirim pada nomor ini, pastikan nomor adalah nomor yang aktif.', // message
        //                    daftarkan, // callback to invoke with index of button pressed
        //                    'Diminoni', // title
        //                    ['Ya', 'Tidak'] // buttonLabels
        //                );
        //            } else {
        //                toastmessage("Username untuk referral tidak ditemukan");
        //                cordova.plugin.pDialog.dismiss();
        //                $("#referral").val("");
        //                $("#referral").focus();
        //            }
        //
        //        }
        //    }
        //
        //    function daftarkan(buttonIndex) {
        //        if (buttonIndex == 2) {
        //            // no
        //        } else {
        //            //            showSpinnerProcess("SPINNER", false, "Diminoni", "Mendaftarkan data...");
        //
        //            var dataString = $("#form_data").serialize();
        //
        //            $.ajax({
        //                url: "http://" + host + "/" + webservicename + "/index.php/api/Customer/insertData",
        //                type: 'POST',
        //                async: true,
        //                data: dataString,
        //                success: function(data) {
        //                    var obj = convertJSON(data)[0];
        //                    if (obj.success == "Nomor telepon sudah dipakai") {
        //                        //                        cordova.plugin.pDialog.dismiss();
        //                        //                        toastmessage(obj.success);
        //                    } else if (obj.success == "Username sudah dipakai") {
        //                        //                        cordova.plugin.pDialog.dismiss();
        //                        //                        toastmessage(obj.success);
        //                    } else if (obj.success == "Register Gagal") {
        //                        //                        cordova.plugin.pDialog.dismiss();
        //                        //                        toastmessage(obj.success);
        //                    } else {
        //                        localStorage.setItem("LoginApp_" + websitename + "_Nomor", (obj.nomor));
        //                        localStorage.setItem("LoginApp_" + websitename + "_Kode", (obj.kode));
        //                        localStorage.setItem("LoginApp_" + websitename + "_Email", $("#email").val());
        //                        localStorage.setItem("LoginApp_" + websitename + "_Password", $("#password").val());
        //                        //				    		localStorage.setItem("LoginApp_" + websitename + "_Referral", (obj.referral));
        //                        //				    		localStorage.setItem("LoginApp_" + websitename + "_Telepon", (obj.telepon));
        //                        //				    		localStorage.setItem("LoginApp_" + websitename + "_Poin", (obj.poin));
        //                        localStorage.setItem("LoginApp_" + websitename + "_Nama", (obj.nama));
        //                        localStorage.setItem("LoginApp_" + websitename + "_Status", (obj.status_aktif));
        //                        //				    		localStorage.setItem("LoginApp_" + websitename + "_Berita", todaydate);
        //
        //                        //                        cordova.plugin.pDialog.dismiss();
        //                        //                        toastmessage("Pendaftaran Berhasil");
        //
        //                        //                        requestValidationCode();
        //
        //                        movepageFast('loginpage');
        //                    }
        //                },
        //                error: function(xhr, ajaxOptions, thrownError) {
        //                    //                    toastmessage("Pendaftaran Gagal");
        //                    //                    cordova.plugin.pDialog.dismiss();
        //                    // console.log(xhr.status);
        //                    // console.log(thrownError);
        //                }
        //            });
        //
        //        }
        //    }
        //
        //    function checkConfirmPass() {
        //        var password = $("#password").val();
        //        var confpass = $("#confpass").val();
        //
        //        var checklength = password.length;
        //
        //        if (checklength >= 5) {
        //            if (password == confpass) {
        //                $("#checkpass").html('&nbsp;');
        //                validasiinsert = true;
        //            } else {
        //                $("#checkpass").html('<i class="icon fa-warning"></i>Sandi dan Konfirm Sandi tidak sama');
        //                validasiinsert = false;
        //            }
        //        } else {
        //            $("#checkpass").html('<i class="icon fa-warning"></i>Sandi minimum 5 karakter');
        //            validasiinsert = false;
        //        }
        //    }
        //
        //    function checkReferral() {
        //        if ($("#referral").val() != "") {
        //            showSpinnerProcess("SPINNER", false, "Diminoni", "Mevalidasi data referral...");
        //
        //            var postName = "Customer/selectData";
        //            var dataString = {
        //                data_username: $("#referral").val()
        //            };
        //            getAjaxPost(postName, dataString, result_success_validasireferral, result_fail_validasireferral);
        //        } else {
        //            setTimeout(function() {
        //                toastmessage("Kode referral harus diisi");
        //            }, 500);
        //        }
        //    }


        //    function requestValidationCode() {
        //
        //        var kode = localStorage.getItem("LoginApp_" + websitename + "_Kode");
        //        var telepon = localStorage.getItem("LoginApp_" + websitename + "_Telepon");
        //
        //        var postName = "Customer/sendSMS";
        //        var dataString = {
        //            data_kode: kode,
        //            data_telepon: telepon
        //        };
        //        getAjaxPost(postName, dataString, result_success_SMS, result_fail_SMS);
        //
        //    }

    </script>
