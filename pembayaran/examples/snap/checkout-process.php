<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-80NdsGu4z3iiodqXj7_PxEPz';
Config::$clientKey = 'SB-Mid-client-pVI6PBoZmeBWCHBy';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
Config::$isProduction = false;

// Enable sanitization
Config::$isSanitized = true;

// Enable 3D-Secure
Config::$is3ds = true;

include("../../../koneksi/koneksi.php");
$id = $_GET['id_transaksi'];

// Query untuk menampilkan data siswa berdasarkan NIS yang dikirim

$query = "SELECT driver.nama_driver, customer.nama_cust, customer.email_cust, customer.no_cust, jalur.awal, jalur.akhir, jalur.harga_jalur AS Harga_do, makanan.nama_makanan, makanan.harga_makanan AS Harga_makan, tanggal, SUM(makanan.harga_makanan+jalur.harga_jalur) AS total  FROM transaksi INNER JOIN driver USING (id_driver) INNER JOIN customer USING (id_cust) INNER JOIN jalur USING (id_jalur) INNER JOIN makanan USING (id_makanan) WHERE id_transaksi = $id";
$sql = mysqli_query($conn, $query);  // Eksekusi/Jalankan query dari variabel $query
while ($data = mysqli_fetch_assoc($sql)) {
  $driver = $data['nama_driver'];
  $customer = $data['nama_cust'];
  $email = $data['email_cust'];
  $hp = $data['no_cust'];
  $tujuanawal = $data['awal'];
  $tujuanakhir = $data['akhir'];
  $ongkir = $data['Harga_do'];
  $makanan = $data['nama_makanan'];
  $hargamakanan = $data['Harga_makan'];
  $tanggal = $data['tanggal'];
  $total = $data['total'];
}


// Uncomment for append and override notification URL
// Config::$appendNotifUrl = "https://example.com";
// Config::$overrideNotifUrl = "https://example.com";

// Required
$transaction_details = array(
  'order_id' => rand(),
  'gross_amount' => $total, // no decimal allowed for creditcard
);

// Optional
$item1_details = array(
  'id' => 'a1',
  'price' => $total,
  'quantity' => 1,
  'name' => $makanan,
);

// Optional
$item_details = array($item1_details);

// Optional
$customer_details = array(
  'first_name'    => $customer,
  'email'         => $email,
  'phone'         => $hp,
);

// Optional, remove this to display all available payment methods
$enable_payments = array('credit_card', 'cimb_clicks', 'bca_va', 'echannel');

// Fill transaction details
$transaction = array(
  'enabled_payments' => $enable_payments,
  'transaction_details' => $transaction_details,
  'customer_details' => $customer_details,
  'item_details' => $item_details,
);

$snap_token = '';
try {
  $snap_token = Snap::getSnapToken($transaction);
} catch (\Exception $e) {
  echo $e->getMessage();
}

// echo "snapToken = ".$snap_token;

function printExampleWarningMessage()
{
  if (strpos(Config::$serverKey, 'your ') != false) {
    echo "<code>";
    echo "<h4>Please set your server key from sandbox</h4>";
    echo "In file: " . __FILE__;
    echo "<br>";
    echo "<br>";
    echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
    die();
  }
}

?>

<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- Font Google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;300;400&family=Lato:wght@400;700;900&family=Roboto:wght@100;300&display=swap" rel="stylesheet">

  <!-- My Style -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Logo Title -->
  <link rel="icon" href="asset/img/logo_jekma 1 (1).png" type="image/x-icon">
  <title>Ojek Mahasiswa</title>
  <!-- icon -->
</head>
<script src="https://kit.fontawesome.com/2bc309c78c.js" crossorigin="anonymous"></script>

<body>

  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4">
      <div class="container">
        <img src="asset/img/jekma 2.png" alt="" width="90" class="d-inline-block align-text-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item mx-3">
              <a class="nav-link" aria-current="page" href="dashboard.html">HOME</a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link" href="driver-on.html">DRIVER ON</a>
            </li>
          </ul>
          <div>
            <button class="btn btn-danger ms-4">LOGOUT</button>
          </div>
        </div>
      </div>
    </nav>

    <!-- Form Card -->

    <div class="container">
      <div class="row">
        <div class="card col-3">
          <img src="asset/img/delivert-order.png" class="card-img-top" alt="..." style="background-color: #FF5E60;">
          <div>
            <p class="p">Nama Driver</p>
            <div>
              <p class="p">Nama Pemesan</p>
            </div>
            <div>
              <p class="p">Hp. Pemesan</p>
            </div>
            <div>
              <p class="p">Lokasi Antar</p>
            </div>
          </div>
        </div>
        <!-- ulasan -->
        <div class="col-8 offset-1">
          <form class="box3">
            <div class="data">
              <h2><b>Detail Pesanan</b></h2>
              <div class="col-md-10 offset-1 align-self-center">
                <table width="100%">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Nama pesanan</th>
                      <th scope="col">Quantity</th>
                      <th scope="col" style="text-align: right;">Harga</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td><?php echo $makanan ?></td>
                      <td center>1 Buah </td>
                      <td style="text-align: right;"><?php echo $hargamakanan ?></td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>ongkir</td>
                      <td><?php echo $tujuanawal, "-", $tujuanakhir ?></td>
                      <td style="text-align: right;"><?php echo $ongkir ?></td>
                    </tr>
                    <tr>
                      <td colspan="4" style="text-align: right;">-----------------------------------------------------------------------------------------------</td>
                    </tr>
                    <tr>
                      <td colspan="3" style="font-weight: bold;">Total Tagihan</td>
                      <td style="text-align: right;"><?php echo $total ?></td>
                    </tr>
                    <tr>

                      <td><button id="pay-button" class="btn btn-primary">bayar</button></td>

                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </form>
        </div>
      </div>


      <!-- Option 1: Bootstrap Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey; ?>"></script>
      <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
          // SnapToken acquired from previous step
          snap.pay('<?php echo $snap_token ?>', {
            // Optional
            onSuccess: function(result) {
              window.location('location:../../../keranjang.php');
              /* You may add your own js here, this is just example */
              document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onPending: function(result) {
              window.location('location:../../../keranjang.php');
              /* You may add your own js here, this is just example */
              document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result) {
              /* You may add your own js here, this is just example */
              document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
          });
        };
      </script>

  </body>

</html>



<!-- <pre><div id="result-json">JSON result will appear here after payment:<br></div></pre>  -->

<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->