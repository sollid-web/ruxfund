<?php
include('../includes/server.php');
include('../includes/functions.php');
include 'includes/checkuser.php';

add_wallet($con);
delete_wallet($con);

$page = array('id'=>6,'title'=>'Transfer | '.$getuser['username'].' ','bread'=>'<i class="fas fa-wallet"></i> My Wallet');
$table = 1;
$pagename = 'Wallet';
?>



<!DOCTYPE html>
<html lang="zxx" class="js">

<!-- head @s -->
<?php include 'includes/head.php';?>
<!-- head @e -->

<body class="nk-body npc-invest bg-lighter ">
    <div class="nk-app-root">
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- header @s -->
            <?php include 'includes/header.php';?>
            <!-- header @e -->
            
            
            
            
            <!-- content @s -->
            <div class="nk-content nk-content-fluid">
                <div class="container-xl wide-xl">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            <div class="content-page">
                                <div class="nk-block-head nk-block-head-lg wide-md">
                                    <div class="nk-block-head-content">
                                        <div class="nk-block-head-sub"><span>Wallet Address</span></div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <?php include 'includes/alert.php';?>
                                <li class="preview-item">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBottom1">Add wallet Address</button>
                                                </li>
                                                
                                                 <!-- @@ Profile Edit Modal @e -->
    <div class="modal fade" role="dialog" id="modalBottom1">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Wallet Address</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#personal">Add Wallet Address</a>
                        </li>
                    </ul><!-- .nav-tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <div class="row gy-4">
                                <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Wallet Address</label>
                                        <input type="text" name="name" class="form-control form-control-lg" id="full-name" value="" placeholder="Enter Wallet Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-county">Select wallet Type</label>
                                        <select name="category" class="form-select" id="address-county" data-ui="lg">
                                          <option label="Select Wallet Type"></option>
                                          <option value="Bitcoin">Bitcoin</option>
                                          <option value="Ethereum">Ethereum</option>
                                          <option value="Tether">Tether USD</option>
                                        </select>
                                    </div>
                                </div> 
                                    <input type="text" name="id" class="form-control" id="amount1" value="<?php echo $getuser['id'];?>" hidden>
                               
                                    
                                    <div class="col-12"  style="margin-top: 10px">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button name="add_wallet" type="submit" class="btn btn-lg btn-primary">Add</button>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                                </form>
                            </div>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
                                <div class="card card-bordered card-preview">
                                        <table class="table table-orders">
                                            <thead class="tb-odr-head">
                                                <tr class="tb-odr-item">
                                                    <th class="tb-odr-info">
                                                        <span class="tb-odr-id">Address</span>
                                                    </th>
                                                    <th class="tb-odr-action">&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody class="tb-odr-body">
                                                
                                               <?php
                  $sn = 1;
                  $wall = loop_for_data($con, 'wallet', 'user', $getuser['id']);
                  foreach ($wall as $wallet) {
                  ?>
                                                
                                              <tr class="tb-odr-item">
                                                    <td class="tb-odr-info">
                                                        <span class="tb-odr-id"><a href="#"><?php echo $wallet['wallet'];?> </a><br><?php echo $wallet['type'];?></span>
                                                    </td>
                                                    <td class="tb-odr-action">
                                                        <div class="dropdown">
                                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                                <ul class="link-list-plain">
                                                                    <li><a href="#" data-toggle="modal" data-target="#modalBottom" class="text-danger">Remove</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <!-- Modal Bottom -->
    <div class="modal fade" tabindex="-1" id="modalBottom">
        <div class="modal-dialog modal-dialog-bottom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Wallet</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                    Are you sure you want to delete <b class="tx-danger"><?php echo $wallet['type'].' - '.$wallet['wallet'];?></b> Wallet??
                </div>
                    <div class="btn-inline">
                        <form action="" method="post">
                    <input type="hidden" value="<?php echo $wallet['id'];?>" name="id">
                    <input type="hidden" value="<?php echo $wallet['type'].' - '.$wallet['wallet'];?>" name="name">
                    <button class="btn btn-danger"  type="submit" name="del_wallet">DELETE</button>
                    </form>
                    </div>
                    
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text"></span>
                </div>
            </div>
        </div>
    </div>
                                                </tr>  
                                                
                                                
                                                
                                                <?php
                $sn++;
                  }
                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div><!-- .card-preview -->
                                
                                
                               
                                
                            </div><!-- .content-page -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- content @e -->
            
            
            
            
            <!-- footer @s -->
            <?php include 'includes/footer.php';?>
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    
    <!-- JavaScript -->
    <?php include 'includes/script.php';?>
    <!-- JavaScript @e -->
</body>

</html>