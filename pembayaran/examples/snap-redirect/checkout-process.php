<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap-redirect:
// https://docs.midtrans.com/en/snap/integration-guide?id=alternative-way-to-display-snap-payment-page-via-redirect

namespace Midtrans;

use mysqli;

require_once dirname(__FILE__) . '/../../Midtrans.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-80NdsGu4z3iiodqXj7_PxEPz';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;

// Uncomment to enable sanitization
// Config::$isSanitized = true;

// Uncomment to enable 3D-Secure
// Config::$is3ds = true;
include("koneksi.php");
$id = $_POST['id_transaksi'];
// $order_id = $_GET['order_id'];
$cekorder = mysqli_query($conn, "SELECT id_makanan FROM transaksi WHERE id_transaksi= $id");
while ($file = mysqli_fetch_assoc($cekorder)) {
    $id_mkananan = $file['id_makanan'];
}
if ($id_mkananan == NULL) {
    $query = "SELECT driver.nama_driver, customer.nama_cust, customer.email_cust, customer.no_cust, jalur.awal, jalur.akhir, jalur.harga_jalur AS Harga_do, tanggal FROM transaksi INNER JOIN driver USING (id_driver) INNER JOIN customer USING (id_cust) INNER JOIN jalur USING (id_jalur) WHERE id_transaksi = $id";
    $sql = mysqli_query($conn, $query);  // Eksekusi/Jalankan query dari variabel $query
    while ($data = mysqli_fetch_assoc($sql)) {
        $driver = $data['nama_driver'];
        $customer = $data['nama_cust'];
        $email = $data['email_cust'];
        $hp = $data['no_cust'];
        $tujuanawal = $data['awal'];
        $tujuanakhir = $data['akhir'];
        $ongkir = $data['Harga_do'];
        $tanggal = $data['tanggal'];
    }
    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim


    // Uncomment for append and override notification URL
    // Config::$appendNotifUrl = "https://example.com";
    // Config::$overrideNotifUrl = "https://example.com";

    // Required
    $transaction_details = array(
        'order_id' => rand(),
        'gross_amount' => $ongkir, // no decimal allowed for creditcard
    );

    // Optional
    $item1_details = array(
        'id' => 'a1',
        'price' => $ongkir,
        'quantity' => 1,
        'name' => $tujuanakhir,
    );

    // Optional
    $item_details = array($item1_details);

    // Optional
    $customer_details = array(
        'first_name'    => $customer,
        'email'         => $email,
        'phone'         => $hp,
    );

    // Fill SNAP API parameter
    $params = array(
        'transaction_details' => $transaction_details,
        'customer_details' => $customer_details,
        'item_details' => $item_details,
    );

    try {
        // Get Snap Payment Page URL
        $paymentUrl = Snap::createTransaction($params)->redirect_url;

        // Redirect to Snap Payment Page
        header('Location: ' . $paymentUrl);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
} else {
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
    // Query untuk menampilkan data siswa berdasarkan NIS yang dikirim


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

    // Fill SNAP API parameter
    $params = array(
        'transaction_details' => $transaction_details,
        'customer_details' => $customer_details,
        'item_details' => $item_details,
    );

    try {
        // Get Snap Payment Page URL
        $paymentUrl = Snap::createTransaction($params)->redirect_url;

        // Redirect to Snap Payment Page
        header('Location: ' . $paymentUrl);
    } catch (\Exception $e) {
        echo $e->getMessage();
    }
}


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
