<?php include('head.php');?>
<?php include('nav.php');?>

<?php
if (isset($_GET['delete'])) 
{
    $delete = $_GET['delete'];

    $create = mysqli_query($ketnoi,"DELETE FROM `khocode` WHERE `id` = '".$delete."' ");

    if ($create)
    {
      echo '<script type="text/javascript">swal("Successful","Delete successfully","success");setTimeout(function(){ location.href = "chuyen-muc.php" },500);</script>'; 
    }
    else
    {
      echo '<script type="text/javascript">swal("Error","Server error","error");setTimeout(function(){ location.href = "chuyen-muc.php" },1000);</script>'; 
    }
}
?>

<?php
if (isset($_POST["submit"]))
{
  $create = mysqli_query($ketnoi,"INSERT INTO `khocode` SET 
    `title` = '".$_POST['title']."',
    `noidung` = '".$_POST['noidung']."',
    `gia` = '".$_POST['gia']."',
    `link` = '".$_POST['link']."',
    `img` = '".$_POST['img']."'");

  if($create)
  {
    echo '<script type="text/javascript">swal("Successful","Success Added","success");
            setTimeout(function(){ location.href = "" },1000);</script>';
  }
  else
  {
    echo '<script type="text/javascript">swal("Lỗi","Lỗi máy chủ","error");</script>'; 
  }
}

?>
<script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="row mb-2">
    <div class="col-sm-6">
    </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Code added </h3>
                <div class="text-right">
                    <a type="button" class="btn btn-dark text-light" data-toggle="modal" data-target="#modal-default"
                        class="btn btn-info">Add</a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>IMG</th>
                                <th>Name</th>
                                 <th>Link</th>
                                <th>Manipulation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$result = mysqli_query($ketnoi,"SELECT * FROM `khocode` ORDER BY id desc ");
while($row = mysqli_fetch_assoc($result))
{
?>
                            <tr>
                                <td><?=$row['id'];?></td>
                                <td><img class="card-img-top" src="<?=$row['img'];?>" alt="<?=$row['title'];?>"></td>
                                <td><?=$row['title'];?></td>
                                <td><?=$row['link'];?></td>
                                </td>
                                <td>
                                    <a href="edit-chuyen-muc.php?id=<?=$row['id'];?>" class="btn btn-default">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="chuyen-muc.php?delete=<?=$row['id'];?>" class="btn btn-default">
                                        <i class="fas fa-trash"></i> Delete
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
<!-- /.row (main row) -->

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ADD CODE</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name :</label>
                        <input type="text" class="form-control" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">IMG</label>
                        <input type="text" class="form-control" name="img" placeholder="" required>
                    </div>
                    
                   
                    <div class="form-group">
                        <label for="exampleInputEmail1">Price:</label>
                        <input type="number" class="form-control" name="gia" required>
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Link :</label>
                        <input type="url" class="form-control" name="link" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description :</label>
                        <textarea class="ckeditor" name="noidung" rows="3"></textarea>
                    </div>

            </div>
            <div class="modal-footer justify-content-between float-end">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php include('foot.php');?>