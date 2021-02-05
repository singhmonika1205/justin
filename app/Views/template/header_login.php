<!DOCTYPE html>
<html>
<head lang="en">
    <!--<meta charset="utf-8">-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title><?php echo $title; ?></title>
    <link href="<?php echo base_url(); ?>/assets/tailwind/tailwind.min.css" rel="stylesheet">
</head>
<body class="gray-bg">
    <?php $this->session = \Config\Services::session();?>
   <?=view($view)?>  
</body>
</html>