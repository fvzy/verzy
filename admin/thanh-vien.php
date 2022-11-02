<?php include('head.php');?>
<?php include('nav.php');?>

<div class="row mb-2">
    <div class="col-sm-6">

    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">DANH SÁCH THÀNH VIÊN</h3>
                <div class="text-right">
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>TÀI KHOẢN</th>
                                <th>SỐ DƯ</th>
                                <th>EMAIL</th>
                                <th>PHONE</th>
                                <th>THỜI GIAN</th>
                                <th>TRẠNG THÁI</th>
                                <th>THAO TÁC</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
if (isset($_POST["timkiem_sub"])) 
{
  $result = mysqli_query($ketnoi,"SELECT * FROM `users` WHERE `username` LIKE '%".$_POST['timkiem']."%' ORDER BY id desc");
}
else
{
  $result = mysqli_query($ketnoi,"SELECT * FROM `users` ORDER BY id desc");
}
?>
                            <?php
while($row = mysqli_fetch_assoc($result))
{
?>

                            <tr>
                                <td><?=$row['id'];?></td>
                                <td><?=$row['username'];?></td>
                                <td><?=tien($row['money']);?></td>
                                <td><?=$row['email'];?></td>
                                <td><?=$row['phone'];?></td>
                                <td><?=$row['time'];?></td>
                                <td><?=bannd($row['bannd']);?></td>
                                <td class="text-center">
                                    <a type="button" class="btn btn-default"
                                        href="edit-thanh-vien.php?username=<?=$row["username"];?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>


<?php include('foot.php');?>