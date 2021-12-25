<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link rel="stylesheet" href="../style/1style.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    
</head>
  <body>
    <div class="area"></div><nav class="main-menu">
            <ul>
                <li>
                    <a href="../penjual/index.php">
                        <i class="fa fa-home fa-2x"></i>
                        <span class="nav-text">
                            Dashboard
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="../penjual/barang.php">
                    <i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i>
                        <span class="nav-text">
                            data barang
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="data_transaksi.php">
                    <i class="fa fa-hand-holding-usd fa-2x"></i>
                        <span class="nav-text">
                            data transaksi
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="verifikasi_penjualan.php">
                    <i class="fa fa-check fa-2x"></i>
                        <span class="nav-text">
                            verifikasi transaksi
                        </span>
                    </a>
                   
                </li>
                <li>
                    <a href="pembatalan.php">
                    <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                        <span class="nav-text">
                            Pembatalan Transaksi
                        </span>
                    </a>
                </li>

            </ul>

            <ul class="logout">
                <li>
                   <a href="../logout.php">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Logout
                        </span>
                    </a>
                </li>  
            </ul>
        </nav>
  </body>
    </html>

</body>
</html>