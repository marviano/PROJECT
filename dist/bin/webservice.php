<?php
    include 'connection.php';
    include_once('dist/lib/PHPMailer/PHPMailerAutoload.php');
    if(isset($_GET['ajx'])){
        if($_GET['ajx'] == "GetKota"){
            echo GetKota($_GET['id_kota']);
        }
    }
	
    function GetKota($id){
        $conn=getConnection();
        $kota = "";
        $qry = "SELECT * FROM inf_lokasi where lokasi_propinsi=$id and lokasi_kecamatan=0 and lokasi_kelurahan=0 and lokasi_kabupatenkota!=0 order by lokasi_nama";
        $result = $conn->query($qry);
        $kota = '<option value="" disabled selected>Pilih Kota</option>';
        if ($result->num_rows > 0){
             while($row = $result->fetch_assoc()){
                $kota .='<option value="'.$row['lokasi_propinsi'].'">'.$row['lokasi_nama'].'</option>';
             }
        }
        $conn->close();
        return $kota;
    }

	function login_account($username,$password){
        $cek_password = getPassword($username,$password);
        $conn=getConnection();
        $password = md5($password);
        if($cek_password == $password){
            getFullName($username);
        }else{
            alert("Wrong Password");
        }
        $conn->close();
    }

    function getPassword($username,$password){
        $conn=getConnection();
        $password = md5($password);
        $qry = "SELECT U.PASSWORD FROM AKUN U WHERE U.EMAIL = '$username' AND U.STATUS = '1'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0){
             while($row = $result->fetch_assoc()){
                 $pass = $row['PASSWORD'];
             }
        }else{
            alert("Wrong Username or Email");
        }
        $conn->close();
        return $password;
    }

    function getFullName($username){
        $conn=getConnection();
        $qry = "SELECT DP.EMAIL,DP.NAMA FROM DETAIL_PENGGUNA DP, AKUN U WHERE DP.EMAIL = '$username' AND U.STATUS = '1'";
        $result = $conn->query($qry);
        if ($result->num_rows > 0){
             while($row = $result->fetch_assoc()){
                $_SESSION['name'] = $row['NAMA'];
                $_SESSION['username'] = $username;
                pindah("index.php");
             }
        }
        $conn->close();
    }
    
    function cek_usernameEmail($email){
        $conn=getConnection();
        $cek = "ok";
        $qry = "SELECT A.EMAIL FROM AKUN A WHERE A.EMAIL = '$email' AND A.STATUS = 1";
        $result = $conn->query($qry);
        if ($result->num_rows > 0){
             while($row = $result->fetch_assoc()){
                 $cek = "no";
             }
        }
        $conn->close();
        return $cek;
    }
    
    function save_account($email,$password,$nama,$telp,$provinsi,$kota,$alamat){
        $secretcode = 123;//MALINDA
        
        if(cek_usernameEmail($email) == "ok"){
            $conn=getConnection();
            $sql1 = "INSERT INTO AKUN(EMAIL,PASSWORD,STATUS,TIPE_AKUN) VALUE('$email','$password','$secretcode',1)";
            if ($conn->query($sql1) === TRUE) {
                $sql2 = "INSERT INTO DETAIL_PENGGUNA(EMAIL,NAMA,PROVINSI,KOTA,ALAMAT,NO_HP) VALUE('$email','$nama','$provinsi','$kota','$alamat','$telp')";
                if ($conn->query($sql2) === TRUE) {
                }
            }else{
                alert("Connection problem to database detected");
            }
            $conn->close();
        }else{
            alert("Username or email already registered");
        }
    }

    function sendEmail($secret_code,$email){//MALINDA
        $mail = new PHPMailer;

        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username = 'sumting.pang@gmail.com';          // SMTP username
        $mail->Password = 'sumting123'; // SMTP password
        $mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                          // TCP port to connect to
        
        $mail->setFrom('sumting.pang@gmail.com', 'Jual Beli Barang Bekas');
        $mail->addReplyTo('sumting.pang@gmail.com', 'Jual Beli Barang Bekas');
        $mail->addAddress($email);   // Add a recipient
        $mail->isHTML(true);  // Set email format to HTML

        $bodyContent = '<h1>Verifikasi Email</h1>';
        
        if($step == "~"){
            $bodyContent .= '<p>Klik link dibawah ini untuk menyelesaikan pendaftaran</p>';
        
            $bodyContent .= '<a href="'.$url.'"><p>KLik disini</p></a>';
        }else{
            $bodyContent .= 'Terima kasih telah mendaftar di sumting';
        }
        $mail->Subject = 'Verifikasi Email - Sumting';
        $mail->Body    = $bodyContent;

        if(!$mail->send()) {
            
        } else {
            echo "Error";
        }
    }

    function alphp($message){
        echo "
        <script type='text/javascript'>
            alert('$message');
        </script>
        ";
    }
?>
