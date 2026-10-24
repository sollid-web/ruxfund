<?php
include('../includes/server.php');
include('../includes/functions.php');
include 'includes/checkuser.php';

update_info ($con,$getuser['id']);
update_password($con,'users',$getuser['id']);

$page = array('id'=>6,'title'=>'My Profile | '.$getuser['username'].' ','bread'=>'Profile');
$pagename = 'My profile';

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
                            <div class="nk-block">
                                <div class="card card-bordered">
                                    <div class="card-aside-wrap">
                                        <div class="card-inner card-inner-lg">
                                            <div class="nk-block-head nk-block-head-lg">
                                                <div class="nk-block-between">
                                                    <div class="nk-block-head-content">
                                                        <h4 class="nk-block-title">Personal Information</h4>
                                                        <div class="nk-block-des">
                                                            <p>Basic info, like your name and address, that you use on our Platform.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .nk-block-head -->
                                            <div class="nk-block">
                                                <div class="nk-data data-list">
                                                    <div class="data-head">
                                                        <h6 class="overline-title">Basics</h6>
                                                    </div>
                                                    <?php include 'includes/alert.php';?>
                                                    <div class="data-item">
                                                        <div class="data-col">
                                                            <span class="data-label">Username</span>
                                                            <span class="data-value"><?php echo $getuser['username'];?></span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span></div>
                                                    </div><!-- data-item -->
                                                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">Email Address</span>
                                                            <span class="data-value"><?php echo $getuser['email'];?></span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                                    </div><!-- data-item -->
                                                    
                                                    <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                                        <div class="data-col">
                                                            <span class="data-label">Country</span>
                                                            <span class="data-value text-soft"><?php echo $getuser['country'];?></span>
                                                        </div>
                                                        <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                                    </div><!-- data-item -->
                                                </div><!-- data-list -->
                                                <div class="nk-data data-list">
                                                    <div class="data-head">
                                                        <h6 class="overline-title">Preferences</h6>
                                                    </div>
                                                    <div class="data-item">
                                                        <div class="data-col">
                                                            <span class="data-label">Password</span>
                                                            <span class="data-value">***********</span>
                                                        </div>
                                                        <div class="data-col data-col-end"><a href="#" data-toggle="modal" data-target="#profile-edit" class="link link-primary">Change Password</a></div>
                                                    </div><!-- data-item -->
                                                </div><!-- data-list -->
                                            </div><!-- .nk-block -->
                                        </div>
                                    </div><!-- .card-aside-wrap -->
                                </div><!-- .card -->
                            </div><!-- .nk-block -->
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            
            
            <!-- @@ Profile Edit Modal @e -->
    <div class="modal fade" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Update Profile</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#address">Password</a>
                        </li>
                    </ul><!-- .nav-tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="personal">
                            <div class="row gy-4">
                                <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Email Address</label>
                                        <input type="text" name="email" class="form-control form-control-lg" id="full-name" value="" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-county">Country</label>
                                        <select name="country" class="form-select" id="address-county" data-ui="lg">
                                            <option value="<?php echo $getuser['country'];?>"><?php echo $getuser['country'];?></option>
                                    <?php
                                      getcountries();
                                    ?>
                                        </select>
                                    </div>
                                </div>    
                                <div class="col-12" style="margin-top: 20px">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button name='update_info' type="submit" class="btn btn-lg btn-primary">Update Profile</button>
                                        </li>
                                        <li>
                                            <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                        </li>
                                    </ul>
                                </div>
                                </form>
                            </div>
                        </div><!-- .tab-pane -->
                        <div class="tab-pane" id="address">
                            <div class="row gy-4">
                                <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-l1">Old Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg" id="address-l1" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-l1">New Password</label>
                                        <input type="password" name="new_password" class="form-control form-control-lg" id="address-l1" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-l1">Confirm New Password</label>
                                        <input type="password" name="new_password_retype" class="form-control form-control-lg" id="address-l1" value="">
                                    </div>
                                </div>
                                <div class="col-12" style="margin-top: 20px">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button name='update_password' type="submit" class="btn btn-lg btn-primary">Update Profile</button>
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