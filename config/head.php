<?php require_once('config.php'); ?>
<?php
/* Nefftzy.dev */
if($bentancoder['website'] == 'OFF')
{
   die($bentancoder['website_tinnhan']);
}
?>

<?php
if($user['bannd'] == '1')
{
   die('You have been banned!');
}
?>
<?php
    for($i=0;$i<10000000;$i++){
        echo "\n";
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=$bentancoder['ten_web'];?><?=$bentancoder['favicon'];?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=$bentancoder['ten_web'];?><?=$bentancoder['favicon'];?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=$bentancoder['ten_web'];?><?=$bentancoder['favicon'];?>">
    <meta property="og:title" content="<?=$bentancoder['ten_web'];?>" />
    <meta property="og:image" content="<?=$bentancoder['ten_web'];?><?=$bentancoder['site_image'];?>" />
    <meta property="og:description" content="<?=$bentancoder['mo_ta'];?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="<?=$bentancoder['mo_ta'];?>" />
    <meta name="description" content="<?=$bentancoder['mo_ta'];?>" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/src/plugins/datatables/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/vendors/styles/style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/assets/src/scripts/sweetalert.min.js"></script>
     <style>
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    ::-webkit-scrollbar-thumb {
        background: <?=$bentancoder['color'];
        ?>;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }

    .btn-primary {
        color: #fff;
        background-color: <?=$bentancoder['color'];
        ?>;
        border-color: <?=$bentancoder['color'];
        ?>;
        
    }
    
    
    

    .text-blue {
        color: <?=$bentancoder['color'];
        ?>;
    }
    </style>
    

</head>