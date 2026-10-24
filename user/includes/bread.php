<?php
    if(!empty($getuser['msg'])){
        ?>
<div class="alert  alert-outline alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
    <?php
            echo $getuser['msg'];
    ?>
          </div>
<?php
    }
    ?>
<div class="slim-pageheader">
          <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><?php echo $page['bread'];?></li>
          </ol>
    <h6 class="slim-pagetitle">
        <small class="text-muted text-capitalize">Available Balance</small><br>
        USD <?php echo number_format(getbal($con,$getuser['id'])['balance'],2);?><br>
        <small class="text-warning text-capitalize"><?php echo number_format(convert_to_btc('USD',getbal($con,$getuser['id'])['balance']),4);?> BTC</small>
    </h6>
        </div><!-- slim-pageheader -->