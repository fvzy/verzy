<?php require_once('../config/head.php'); ?>
<title>Source Code</title>
<?php require_once('../config/nav.php'); ?>



<style>
.pagination {
list-style: none;
display: inline-block;
padding: 0;
margin-top: 10px;
}
.pagination li {
display: inline;
text-align: center;
}
.pagination a {
float: left;
display: block;
font-size: 14px;
text-decoration: none;
padding: 5px 12px;
color: #ff0000;
margin-left: -1px;
border: 1px solid transparent;
line-height: 1.5;
}
.pagination a.active {
cursor: default;
}
.pagination a:active {
outline: none;
}

.modal-1 li:first-child a {
-moz-border-radius: 6px 0 0 6px;
-webkit-border-radius: 6px;
border-radius: 6px 0 0 6px;
}
.modal-1 li:last-child a {
-moz-border-radius: 0 6px 6px 0;
-webkit-border-radius: 0;
border-radius: 0 6px 6px 0;
}
.modal-1 a {
border-color: #ddd;
color: #4285F4;
background: #fff;
}
.modal-1 a:hover {
background: #eee;
}
.modal-1 a.active, .modal-1 a:active {
border-color: #4285F4;
background: #4285F4;
color: #fff;
}
</style>
<?php
    
if (isset($_GET["page"])){
$page  = abs($_GET["page"]);
}else{
$page=1;
};
$num_rec_per_page=8;
$start_from = ($page-1) * $num_rec_per_page;
    $total_records = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM khocode "));
if($username){
     $total_records = mysqli_num_rows(mysqli_query($ketnoi, "SELECT * FROM khocode "));
}

$total_pages = ceil($total_records / $num_rec_per_page);
?>
	  <div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Source Code Web</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Source Code Web</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
                <div class="row clearfix">
                   <?php

$cash = mysqli_query($ketnoi, "SELECT * FROM khocode order by ID desc LIMIT $start_from, $num_rec_per_page");
if($username){
    $cash = mysqli_query($ketnoi, "SELECT * FROM khocode order by ID desc LIMIT $start_from, $num_rec_per_page");
}
if (mysqli_num_rows($cash) == 0):
?><tr><td colspan="7" class="text-center">No codes yet!</td></tr>
<?php else: while ($row = mysqli_fetch_array($cash, MYSQLI_ASSOC)):?>       
    
				
                  <div class="col-lg-3 col-md-6 col-sm-12 mb-30">
						<div class="card card-box">
						    <a href="/mua-code/<?=$row['id'];?>" class="border-bottom border-primary">
						        							
				
				<img class="card-img-top" src="<?=$row['img'];?>" alt="<?=$row['title'];?>">
										
							</a>
							<div class="card-body">
								<h5 class="card-title weight-500 text-center"><?=$row['title'];?></h5>

                                                <span class="d-block">
<h6 class="h4 font-w700 mb-2 text-muted text-center">
    <font style="color: blue;  margin-top: -100px;">Rp. <?=number_format($row['gia']);?></font>
</h6>
</span>
								<div class="col text-center">
								<a href="/mua-code/<?=$row['id'];?>" class="btn btn-primary">Buy now</a>
								 </div>
							</div>
						</div>
						</div>
						
								
          <?php $i++; endwhile; endif; ?> 
          	</div>
  <nav aria-label="Page navigation example">
  <ul class="pagination"><?
echo "<li class='page-item'><a class='page-link' href='/kho-code-web?page=1' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
for ($i=1; $i<=$total_pages; $i++) {
echo "<li class='page-item'><a class='page-link' href='/kho-code-web?page=".$i."'>".$i."</a></li>";
};
echo "<li class='page-item'><a class='page-link' href='/kho-code-web?page=$total_pages' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>";
?>
  </ul>
</nav>                  
                                 					
						
						</div>
<?php require_once('../config/foot.php'); ?>