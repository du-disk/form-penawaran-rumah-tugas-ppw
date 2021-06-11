<?php
    /**
    * @author Dudi Iskandar
    * @date June 10, 2021 20:00
    * @titleTugas PPW
    * @version PHP 7.2
    */

    // Declare Constant
    define ("AUTHOR","Dudi Iskandar");
    define ("KELAS","Karyawan A");
    define ("NPM",191106041405);
    define ("TITLE","Form Penawaran Rumah - Tugas PPW");

    $name="";
    $house_type="";
    $tenor="";
    $building=null;
    $land=null;
    $harga=null;
    $monthly_payment=null;
    // Hitung Function
    if(!empty($_GET['name']) && !empty($_GET['house_type']) && !empty($_GET['tenor'])){
        $name=$_GET['name'];
        $house_type=$_GET['house_type'];
        $tenor=$_GET['tenor'];
        $total_month = (int)$tenor * 12;

        if($house_type=="A"){
            $harga=180000000;
            $building=29;
            $land=60;
            $monthly_payment = $harga/$total_month;
        }else if($house_type=="B"){
            $harga=240000000;
            $building=36;
            $land=72;
            $monthly_payment = $harga/$total_month;
        }else{
            $harga=300000000;
            $building=45;
            $land=90;
            $monthly_payment = $harga/$total_month;
        }
    }

    include"./header.php";
?>
    <div class="container text-center mt-100 min-h-200">
        <div class="alert alert-info rouded alert-dismissible fade show" role="alert">
            Nama : <strong>Dudi Iskandar</strong> | NPM : <strong>1911106041405</strong>   
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="row mt-4">
            <?php
                if(empty($_GET['name']) && empty($_GET['house_type']) && empty($_GET['tenor'])){
                    echo("<div class='col-3'> </div>");
                }
            ?>
            <div class="col-12 col-md-6">
                <div class="card text-left mb-4 rounded shadow custom-card">
                    <div class="card-body">
                        <h4 class="mt-2 mb-2">Form Penawaran Rumah</h4>
                        <form name="form_submit" method="GET">
                            <div>
                                <label for="name" class="label">Nama Pelanggan</label>
                                <div class="input-group mb-3">
                                    <input type="text" required class="form-control rounded" name="name" aria-describedby="basic-addon3" value="<?=$name;?>">
                                </div>
                            </div>
                            <div>
                                <label for="name" class="label">Tipe Rumah</label>
                                <div class="input-group mb-3">
                                    <select required class="form-control rounded" name="house_type" value="<?=$house_type;?>">
                                        <option>-Pillih--</option>
                                        <option value="A" <?=$house_type=="A"?"selected":"";?>>TIPE A (29/60) -- Rp. 180.000.000</option>
                                        <option value="B" <?=$house_type=="B"?"selected":"";?>>TIPE B (36/72) -- Rp. 240.000.000</option>
                                        <option value="C" <?=$house_type=="C"?"selected":"";?>>TIPE C (45/90) -- Rp. 300.000.000</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label for="name" class="label">Tenor Pembayaran</label>
                                <div class="input-group mb-3">
                                    <select required class="form-control rounded" name="tenor" value="<?=$tenor;?>">
                                        <option>-Pillih--</option>
                                        <option value="5" <?=$tenor=="5"?"selected":"";?>>5 Tahun</option>
                                        <option value="10" <?=$tenor=="10"?"selected":"";?>>10 Tahun</option>
                                        <option value="15" <?=$tenor=="15"?"selected":"";?>>15 Tahun</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <button class="btn btn-primary rounded btn-block" type="submit">Hitung</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- 
                Akan Tampil ketika sudah klik tombol hitung
            -->
            <?php
                if(!empty($_GET['name']) && !empty($_GET['house_type']) && !empty($_GET['tenor'])){
            ?>
                <div class="col-12 col-md-6">
                    <div class="card text-left mb-4 rounded shadow custom-card">
                        <div class="card-body">
                            <h4 class="mt-2 mb-3">Hai, <strong><?=$name;?></strong></h4>
                            <div>
                                <p class="fs">Berikut Rincian Rumah yang anda pilih:</p>
                                <div classs="table-responsive">
                                    <table class="table table-rounded">
                                        <tr>
                                            <th>Tipe Rumah</th>
                                            <th>Bangunan</th>
                                            <th>Tanah</th>
                                            <th>Harga (Rp)</th>
                                        </tr>
                                        <tr>
                                            <td><?=$house_type;?></td>
                                            <td><?=$building;?></td>
                                            <td><?=$land;?></td>
                                            <td><?=number_format($harga);?></td>
                                        </tr>
                                    </table>
                                </div>
                                <p class="fs">Dengan Tenore Pembayaran <strong class="fs-14"><?=$tenor;?></strong> tahun (<?=$total_month;?>)</p>
                                <p class="fs">Sehingga cicilan anda menjadi sebesar <strong class="fs-14">Rp <?=number_format($monthly_payment);?></strong> / bulan.</p>
                            </div>
                            <div>
                                <a class="btn btn-danger rounded btn-block" href="/" type="button">Reset</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
<?php 
    include"./footer.php"; 
?>

