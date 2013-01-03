<!DOCTYPE html>
<html>
  <head>
    <title>Warren County Virtual Museum - Curation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
      .modal-body {
        max-height: 800px;
      }
    </style>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          
          <a class="brand" href="<?php echo base_url() ?>main">Warren County Virtual Museum - Curator's Desk</a>
          <div class="nav-collapse collapse pull-right">
            <ul class="nav">
                <?php
                if ($this->bitauth->logged_in())
                {
                    echo '<li><a href="'.base_url().'curate/logout">Logout</a></li>';
                }
                ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      
      
    <div class="container">
      <div class="row">
        <div class="span3">
          
            <?php
            if ($this->bitauth->logged_in())
            {
                echo '<div class="well sidebar-nav">';
                echo '<ul class="nav nav-list">';
                echo '<li class="nav-header">Curator Tools</li>';
                echo '<li><a href="'.base_url().'curate/tag_list">Manage Tags</a></li>';
                echo '<li><a href="#">Manage Artifacts</a></li>';
                echo '</ul>';
                echo '</div>';
            }
            ?>

          
        </div><!--/span-->
