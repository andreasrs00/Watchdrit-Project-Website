<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Watchdrit-Project-Website/collection/style.css"/>

    <link
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
  <?php
  include '../koneksi.php';
  ?>
  </head>
  <body>
    <nav>
      <div class="navbar">
        <div class="nav-container">
          <input class="checkbox" type="checkbox" name="" id="" />
          <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
          </div>
          <div class="logo"></div>
          <div class="menu-items">
            <li><a href="/Watchdrit-Project-Website/LandingPage/index.php">Home</a></li>
            <li>
              <a href="/Watchdrit-Project-Website/LoginPage/index.php">Login</a>
            </li>
            <li>
              <a href="/Watchdrit-Project-Website/NewArrivalPage/index.php"
                >New Arrivals</a
              >
            </li>
            <li><a href="#">Collection</a></li>
            <li><a href="/Watchdrit-Project-Website/LandingPage/index.php#contact">Contact Us</a></li>
          </div>
        </div>
      </div>
    </nav>

    <div class="containerIsi">
      <div class="containerJudul">
        <hr width="5%" size="5px" color="black" />
        <h1>Sport's Collection</h1>
        <hr width="5%" size="5px" color="black" />
      </div>
    </div>
    <div class="catalog">
    <?php
      session_start();
      $query = "SELECT * FROM produk WHERE arrival IN (3,1)";
      $execQuery = pg_query($connection, $query);

      $i = 1;

      while ($data = pg_fetch_assoc($execQuery) AND $i!=9) {
        $idProduk = $data['id_produk'];
        $namaProduk = $data['nama_produk'];
        $hargaProduk = $data['harga_produk'];
        $formatHarga = number_format($hargaProduk, 0, ',', '.');
        ?>
        <div class="item">
          <img src="sport<?=$i?>.png" alt="Jam <?=$i?>">
          <h3><?=$namaProduk?></h3>
          <p>Rp<?=$formatHarga?></p>
          <form action="./proses.php" method="POST">
            <input type="hidden" name="idProduk" value="<?=$idProduk?>">
            <input type="hidden" name="namaProduk" value="<?=$namaProduk?>">
            <input type="hidden" name="hargaProduk" value="<?=$hargaProduk?>">
            <button type="submit" name="tambahPembelian" data-id="<?=$idProduk?>"
            data-name="<?=$namaProduk?>"
            data-price="<?=$hargaProduk?>" class="add-to-cart-button">
            ADD TO CART</button>
          </form>
          <div class="overlay">
            <img src="man<?=$i?>.png" alt="jam <?=$i?> hover">
          </div>
        </div>
        <?php
        $i++;
      }
    ?>
    </div>

    <div class="containerIsi">
      <div class="containerJudul">
        <hr width="5%" size="5px" color="black" />
        <h1>Men's Collection</h1>
        <hr width="5%" size="5px" color="black" />
      </div>
    </div>

    <div class="catalog">
    <?php
      

      $query = "SELECT * FROM produk WHERE kategori = 1 AND arrival = 0";
      $execQuery = pg_query($connection, $query);

      $i = 1;

      while ($data = pg_fetch_assoc($execQuery)) {
        $idProduk = $data['id_produk'];
        $namaProduk = $data['nama_produk'];
        $hargaProduk = $data['harga_produk'];
        $formatHarga = number_format($hargaProduk, 0, ',', '.');
        ?>
        <div class="item">
          <img src="mjam<?=$i?>.png" alt="Jam <?=$i?>">
          <h3><?=$namaProduk?></h3>
          <p>Rp<?=$formatHarga?></p>
          <form action="../collection/proses.php" method="POST">
            <input type="hidden" name="idProduk" value="<?=$idProduk?>">
            <input type="hidden" name="namaProduk" value="<?=$namaProduk?>">
            <input type="hidden" name="hargaProduk" value="<?=$hargaProduk?>">
            <button type="submit" name="tambahPembelian" data-id="<?=$idProduk?>"
            data-name="<?=$namaProduk?>"
            data-price="<?=$hargaProduk?>" class="add-to-cart-button">
            ADD TO CART</button>
          </form>
          <div class="overlay">
            <img src="hovermjam<?=$i?>.png" alt="jam <?=$i?> hover">
          </div>
        </div>
        <?php
        $i++;
      }
    ?>
    </div>

     <div class="containerIsi">
      <div class="containerJudul">
        <hr width="5%" size="5px" color="black" />
        <h1>Women's Collection</h1>
        <hr width="5%" size="5px" color="black" />
      </div>
    </div>

    <div class="catalog">
    <?php
      

      $query = "SELECT * FROM produk WHERE (kategori = 2 AND arrival IN (0, 1)) OR id_produk BETWEEN 9 AND 12";
      $execQuery = pg_query($connection, $query);

      $i = 1;

      while ($data = pg_fetch_assoc($execQuery)) {
        $idProduk = $data['id_produk'];
        $namaProduk = $data['nama_produk'];
        $hargaProduk = $data['harga_produk'];
        $formatHarga = number_format($hargaProduk, 0, ',', '.');
        ?>
        <div class="item">
          <img src="wjam<?=$i?>.png" alt="Jam <?=$i?>">
          <h3><?=$namaProduk?></h3>
          <p>Rp<?=$formatHarga?></p>
          <form action="../collection/proses.php" method="POST">
            <input type="hidden" name="idProduk" value="<?=$idProduk?>">
            <input type="hidden" name="namaProduk" value="<?=$namaProduk?>">
            <input type="hidden" name="hargaProduk" value="<?=$hargaProduk?>">
            <button type="submit" name="tambahPembelian" data-id="<?=$idProduk?>"
            data-name="<?=$namaProduk?>"
            data-price="<?=$hargaProduk?>" class="add-to-cart-button">
            ADD TO CART</button>
          </form>
          <div class="overlay">
            <img src="hoverwjam<?=$i?>.png" alt="jam <?=$i?> hover">
          </div>
        </div>
        <?php
        $i++;
      }
    ?>
    </div>
      
    <div class="containerIsi">
      <div class="containerJudul">
        <hr width="5%" size="5px" color="black" />
        <h1>Smartwatches Collection</h1>
        <hr width="5%" size="5px" color="black" />
      </div>
    </div>

    <div class="catalog">
    <?php
      

      $query = "SELECT * FROM produk WHERE kategori IN(4) ";
      $execQuery = pg_query($connection, $query);

      $i = 1;

      while ($data = pg_fetch_assoc($execQuery)) {
        $idProduk = $data['id_produk'];
        $namaProduk = $data['nama_produk'];
        $hargaProduk = $data['harga_produk'];
        $formatHarga = number_format($hargaProduk, 0, ',', '.');
        ?>
        <div class="item">
          <img src="sjam<?=$i?>.png" alt="Jam <?=$i?>">
          <h3><?=$namaProduk?></h3>
          <p>Rp<?=$formatHarga?></p>
          <form action="../collection/proses.php" method="POST">
            <input type="hidden" name="idProduk" value="<?=$idProduk?>">
            <input type="hidden" name="namaProduk" value="<?=$namaProduk?>">
            <input type="hidden" name="hargaProduk" value="<?=$hargaProduk?>">
            <button type="submit" name="tambahPembelian" data-id="<?=$idProduk?>"
            data-name="<?=$namaProduk?>"
            data-price="<?=$hargaProduk?>" class="add-to-cart-button">
            ADD TO CART</button>
          </form>
          <div class="overlay">
            <img src="hoversjam<?=$i?>.png" alt="jam <?=$i?> hover">
          </div>
        </div>
        <?php
        $i++;
      }
    ?>
    </div>
      
    <div class="containerIsi">
      <div class="containerJudul">
        <hr width="5%" size="5px" color="black" />
        <h1>Kid's watches Collection</h1>
        <hr width="5%" size="5px" color="black" />
      </div>
    </div>

    <div class="catalog">
    <?php
      

      $query = "SELECT * FROM produk WHERE kategori IN(5)";
      $execQuery = pg_query($connection, $query);

      $i = 1;

      while ($data = pg_fetch_assoc($execQuery)) {
        $idProduk = $data['id_produk'];
        $namaProduk = $data['nama_produk'];
        $hargaProduk = $data['harga_produk'];
        $formatHarga = number_format($hargaProduk, 0, ',', '.');
        ?>
        <div class="item">
          <img src="kjam<?=$i?>.png" alt="Jam <?=$i?>">
          <h3><?=$namaProduk?></h3>
          <p>Rp<?=$formatHarga?></p>
          <form action="../collection/proses.php" method="POST">
            <input type="hidden" name="idProduk" value="<?=$idProduk?>">
            <input type="hidden" name="namaProduk" value="<?=$namaProduk?>">
            <input type="hidden" name="hargaProduk" value="<?=$hargaProduk?>">
            <button type="submit" name="tambahPembelian" data-id="<?=$idProduk?>"
            data-name="<?=$namaProduk?>"
            data-price="<?=$hargaProduk?>" class="add-to-cart-button">
            ADD TO CART</button>
          </form>
          <div class="overlay">
            <img src="hoverkjam<?=$i?>.png" alt="jam <?=$i?> hover">
          </div>
        </div>
        <?php
        $i++;
      }
    ?>
    </div>
      
<?php
  if(isset($_SESSION['id_cartcollection'])){
    ?>
    <!-- Button trigger modal -->
    <button type="button" class="btn-open-cart" data-toggle="modal" data-target="#exampleModal">
      OPEN CART
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <div class="cart-items">
                      <?php
                      $totalHarga = 0;
                        $idCart = $_SESSION['id_cartcollection'];
                        $query = "SELECT pb.id_produk, pr.nama_produk, pr.harga_produk
                                  FROM pembelian pb
                                  JOIN produk pr ON pb.id_produk = pr.id_produk
                                  WHERE pb.id_cart = $1";

                        $execQuery = pg_query_params($connection,$query,array($idCart));

                        while ($data = pg_fetch_assoc($execQuery)) {
                            $id_produk = $data['id_produk'];
                            $nama_produk = $data['nama_produk'];
                            $harga_produk = $data['harga_produk'];
                            $formatHarga = number_format($harga_produk, 0, '.', '.');

                            ?>
                            <div class="cart-item">
                                <span>ID Produk: <?php echo $id_produk; ?></span> <br>
                                <span>Nama Produk: <?php echo $nama_produk; ?></span> <br>
                                <span>Harga Produk: <?php echo $formatHarga; ?></span> <br>
                            </div>
                          <?php
                            $totalHarga += $harga_produk;
                            $formatTotal = number_format($totalHarga, 0, '.', '.');
                        }
                        echo '<br> <div class="total-harga">Total Harga : ' . $formatTotal . '</div>';
                        ?>
                  </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <form action="../collection/proses.php" method="post">
                <button type="submit" name="clearPembelian" class="btn btn-primary">Clear</button>
              </form>
              <form action="../collection/proses.php" method="post">
                <input type="hidden" name="totalHarga" value="<?=$totalHarga?>">
                <button type="submit" name="submitPembelian" class="btn btn-primary">Buy</button>
              </form>
          </div>
        </div>
      </div>
    </div>
    <?php
  }
?>

    <script src="/Watchdrit-Project-Website/collection/script.js"></script>
  </body>
</html>