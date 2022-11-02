<?php include '../config/head.php'; ?>
<title>HOSTING PACK LIST</title>
<?php include '../config/nav.php'; ?>


<div class="main-container">
  <div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
      <div class="page-header">
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="title">
              <h4>Hosting price list</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hosting price list</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <div class="col-lg-20 col-md-20 col-sm-20 mb-30">
        <div class="pd-20 card-box">
          <h5 class="h4 text-blue mb-20">CPANEL HOSTING</h5>
          <ul class="nav nav-tabs">
            <li><a class="btn btn-primary btn-rounded active" data-toggle="tab" href="#singapore">SINGAPORE</a></li>
          </ul>
          <div class="tab-content">

            <div id="singapore" class="tab-pane fade in show active">
              <div class="row">
                <?php
                $result = mysqli_query($ketnoi, "SELECT * FROM `ds_host` WHERE server = 'Singapore'");
                if (mysqli_num_rows($result) == 0):
                ?><center>Chưa có gói host nào!</center>
                <?php else : while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)): ?>
                <div class="col-md-4 mb-30">
                  <div class="card-box pricing-card-style2">
                    <div class="pricing-card-header">
                      <div class="left">
                        <h5><?=$row['ten']; ?></h5>
                      </div>
                      <div class="right">
                        <div class="pricing-price">
                          Rp.<?=number_format($row['gia']); ?><span>30 DAY</span>
                        </div>
                      </div>
                    </div>
                    <div class="pricing-card-body">
                      <center>
                        <ul>
                          <li><?=$row['note']; ?></li>

                        </ul>
                      </center>
                    </div>
                    <div class="cta">
                      <center>
                        <?php if ($bentancoder['trangthaimua'] == 0) {
                          ?>
                          <a id="bentancoder_<?=$row['id']; ?>" href="/mua-hosting/<?=$row['id']; ?>"
                            class="btn btn-primary btn-rounded btn-lg buy">Buy now</a>
                          <?php
                        } ?>
                        <?php if ($bentancoder['trangthaimua'] == 1) {
                          ?>
                          <button onclick="hethang()" class="btn btn-primary btn-rounded btn-lg buy">OUT OF STOCK</button>
                          <?php
                        } ?>
                      </center>
                    </div>
                  </div>
                </div>
                <?php if ($bentancoder['trangthaimua'] == '0') {
                  ?>
                  <script>
                    $(document).ready(function() {
                      $('#bentancoder_<?=$row['id']; ?>').click(function() {
                        $('#bentancoder_<?=$row['id']; ?>').html('Please wait...');
                      });
                    });
                  </script>
                  <?php
                } ?>

                <?php $i++; endwhile; endif; ?>
              </div>
            </div>







          </div>
        </div>
      </div>
    </div>
    <?php if ($bentancoder['trangthaimua'] == '1') {
      ?>
      <script>
        function hethang() {
          swal("Notify", "Out of stock !");
        }
      </script>
      <?php
    } ?>
    <?php include '../config/foot.php'; ?>