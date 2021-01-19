<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>DapurDesa Kabupaten Bogor</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/feather.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select2.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dropzone.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/uppy.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.steps.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.timepicker.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/app-dark.css" id="darkTheme" disabled>
    <?php
        if( ! empty( $css ) ) { 
            foreach ($css as $style) echo '<link rel="stylesheet" type="text/css" href="' . base_url() . $style . '.css" />', "\n"; 
        }
    ?>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
  </head>