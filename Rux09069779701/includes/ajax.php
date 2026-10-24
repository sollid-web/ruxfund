<?php
include('../../includes/server.php');
include 'derfdssf.php';
include('../../includes/functions.php');


if (! empty($_POST["trans_id"])) {
    $user_id = $_POST["user"];
    $key = $_POST["trans_id"];
    $dep_data = get_data($con, 'transaction', 'id', $key);
    //ID Transaction
if($dep_data['status'] == 0){
                                                           $stat = 'Pending';
                                                           $close = 'Pending Verification';
                                                           $ver_day = 'Pending Verification';
                                                           $profit = 'Unavailable';
                                                           $compl = 'Pending Verification';
                                                       }else{
                                                           $stat = 'Verified';
                                                           $ver_day = smart_date($dep_data['updated']);
                                                           $profit = '$ '.smart_amount(getprofit_per_investment($con, $dep_data['id']));
                                                       }
                                                       if($dep_data['status'] == 1 && $dep_data['closed']==1){
                                                           $close = 'Completed';
                                                           $compl = smart_date($dep_data['closetime']);
                                                       }
                                                       if($dep_data['status'] == 1 && $dep_data['closed']==0){
                                                           $close = 'Active';
                                                           $compl = 'Active';
                                                       }

?>
<div class="modal-dialog"> 
                                                <div class="modal-content"> 
                                                    <div class=""> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div> 
                                                    <div class="modal-body">  
                                                            <div class=""> 
                                                                <div class="card">
                                                                    <?php
                                                                    if($dep_data['type'] == 'Deposit'){
                                                                    ?>
                                                                    <div class="card-header bg-success">
                                                            <h3 class="card-title text-white"><?php echo $dep_data['type'];?></h3>
                                                        </div>
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item"><span><b>User</b></span> <span class='float-right tx-primary'><?php echo get_data($con, 'users', 'id', $dep_data['sender'])['username'];?></span></li>
                                                                        <li class="list-group-item"><span><b>Amount</b></span> <span class='float-right tx-primary'><?php echo '$ '.smart_amount($dep_data['amount']);?></span></li>
                                                                        <li class="list-group-item"><span><b>Deposit Plan</b></span> <span class='float-right tx-primary'><?php echo get_data($con, 'plan', 'id', $dep_data['plan'])['name'];?></span></li>
                                                                        <li class="list-group-item"><span><b>Verified on</b></span> <span class='float-right tx-primary'><?php echo $ver_day;?></span></li>
                                                                        
                                                                        <?php
                    if($dep_data['status'] == 1){
                        if($dep_data['closed'] == 0){
                            if(is_due($con, $dep_data['id'])['due'] == TRUE){
                            close_inv($con,$dep_data['id']);
                    ?>
                    <?php
                            }else{
                                ?>
                                                                        <li class="list-group-item"><span><b>Completes on</b></span> <span class='float-right tx-primary'><?php echo smart_date(is_due($con, $dep_data['id'])['on']).'/ <b class="text-primary">'.get_capital_due_day(is_due($con, $dep_data['id'])['on']).'</b>';?></span></li>
                    <?php
                            }
                        }else{
                            ?>
                                                                        <li class="list-group-item"><span><b>Completed on</b></span> <span class='float-right tx-primary'><?php echo smart_date($dep_data['closetime']);?></span></li>
                    <?php
                        }
                    }
                    ?>
                    
                                                                    </ul>
                                                                    
                                                                    
                                                                    <div class="card-body">
                                                                        <hr>
                                                                        <div class="card-header bg-dark">
                                                            <h3 class="card-title text-white">Edit Deposit</h3>
                                                        </div>
                                                                        <small class="text-info">You can affect the available balance and system balance by changing the amount</small>
                                        <form method="get" action="">
                                            <input name="user_id" type="hidden" value="<?php echo complex_para($user_id);?>">
                                            <input name="id" type="hidden" value="<?php echo complex_para($dep_data['id']);?>">
                                            <div class="form-group">
                                                <label >Amount</label><br>
                                                
                                                <input type="text" name="amt" class="form-control"  value="<?php echo $dep_data['amount'];?>">
                                            </div>
                                            <div class="form-group">
                                                <label >Amount</label><br>
                                                <select name="plan" class="form-control">
                    <?php
                    $loopplan = loop_table($con, 'plan');
                    foreach ($loopplan as $plan) {
                    ?>
                    <option value="<?php echo $plan['id'];?>" <?php if($plan['id'] == $dep_data['plan']){ echo 'selected';}?>><?php echo $plan['name'];?></option>
                    <?php
                    }
                    ?>
                  </select>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="up_am" class="btn btn-success waves-effect waves-light">Update Amount</button>
                                            </div>
                                        </form>
                                    </div>
                                                                    
                                                                    <?php
                                                                    }
                                                                    if($dep_data['type'] == 'Withdraw'){
                                                                    ?>
                                                        <div class="card-header bg-warning">
                                                            <h3 class="card-title text-white"><?php echo $dep_data['type'];?></h3>
                                                        </div>
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item"><span><b>User</b></span> <span class='float-right tx-primary'><?php echo get_data($con, 'users', 'id', $dep_data['sender'])['username'];?></span></li>
                                                                        <li class="list-group-item"><span><b>Amount</b></span> <span class='float-right tx-primary'><?php echo '$ '.smart_amount($dep_data['amount']);?></span></li>
                                                                        <li class="list-group-item"><span><b>Requested On</b></span> <span class='float-right tx-primary'><?php echo smart_date($dep_data['time']);?></span></li>
                                                                        <li class="list-group-item"><span><b>Paid on</b></span> <span class='float-right tx-primary'><?php echo $ver_day;?></span></li>
                                                                        <li class="list-group-item"><span><b>Wallet Address</b></span> <span class='float-right tx-primary'><?php echo $dep_data['paidby'];?></span></li>
                                                                        <li class="list-group-item"><span><b>Verified on</b></span> <span class='float-right tx-primary'><?php echo $ver_day;?></span></li>
                                                                    </ul>
                                                    
                                                                    <?php
                                                                    }
                                                                    if($dep_data['type'] == 'Transfer' || $dep_data['type'] == 'Bonus' || $dep_data['type'] == 'Penalty'){
                                                                    ?>
                                                                    <div class="card-header bg-primary">
                                                            <h3 class="card-title text-white"><?php echo $dep_data['type'];?></h3>
                                                        </div>
                                                                    <ul class="list-group">
                                                                        <li class="list-group-item"><span><b>User</b></span> <span class='float-right tx-primary'><?php echo get_data($con, 'users', 'id', $dep_data['sender'])['username'];?></span></li>
                                                                        <li class="list-group-item"><span><b>Requested On</b></span> <span class='float-right tx-primary'><?php echo smart_date($dep_data['time']);?></span></li>
                                                                        <li class="list-group-item"><span><b>Paid on</b></span> <span class='float-right tx-primary'><?php echo $ver_day;?></span></li>
                                                                    </ul>
                                                                    <?php 
                                                                    }
                                                                    ?>
                                                                    
                                                    </div>
                                                        </div> 
                                                    </div> 
                                                    <div class="modal-footer" style="border:none;">
                                                        <?php
                                                        if($dep_data['status'] == 0 && $dep_data['type'] != 'Transfer' && $dep_data['type'] != 'Bonus'){
                                                        ?>
                                                        <a href="?u=<?php echo complex_para($user_id)?>&ac=<?php echo complex_para($dep_data['id'])?>" class="btn btn-info waves-effect waves-light">Confirm</a>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div> 
                                                </div> 
                                            </div>

<?php
}
if (! empty($_POST["del_id"])) {
    $user_id = $_POST["user"];
    $para = $_POST["para"];
    $key = $_POST["del_id"];
?>

<div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Are you sure to delete?</h4>
                                                    </div>
                                                    <div class="modal-footer no-border">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                                                        <a href="?u=<?php echo complex_para($user_id);?>&<?php echo $para;?>=<?php echo complex_para($key);?>" class="btn btn-pink waves-effect">Delete</a> 
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div>

<?php
}
if (! empty($_POST["wallet_id"])) {
    $key = $_POST["wallet_id"];
    $wallet = get_data($con, 'wallet', 'id', $key);
?>
<div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="" method="post">
                    <div class="form-group">
                      <label class="form-control-label">Choose Wallet Type <span class="tx-danger">*</span></label>
                <select name="type" class="form-control select2">
                    <option <?php if($wallet['type'] == 'Bitcoin'){echo 'selected';}?> value="Bitcoin">Bitcoin</option>
                    <option <?php if($wallet['type'] == 'Ethereum'){echo 'selected';}?> value="Ethereum">Ethereum</option>
                    <option <?php if($wallet['type'] == 'Litecoin'){echo 'selected';}?> value="Litecoin">Litecoin</option>
                  </select>
                    </div><!-- form-group -->
                    <input type="hidden" value="<?php echo $wallet['id'];?>" name="id">
                    <div class="form-group mg-b-20">
                        <label class="form-control-label">Enter Your Wallet Address <span class="tx-danger">*</span></label>
                        <input type="text" placeholder="Wallet Address" name="wallet" value="<?php echo $wallet['wallet'];?>" class="form-control">
                    </div><!-- form-group -->

                    <button class="btn btn-success btn-block" type="submit" name="wallet_admin_update">Edit Wallet</button>
                    </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div>

<?php
}

if (! empty($_POST["setting_id"]) && ! empty($_POST["item"])) {
    $type = $_POST['setting_id'];
    $id = $_POST['item'];
    if($type == 1){
        $dep_d = get_data($con, 'plan', 'id', $id);
    }
    
    if($type == 2){
        $dep_d = get_data($con, 'test', 'id', $id);
    }
    
    if($type == 3){
        $dep_d = get_data($con, 'faq', 'id', $id);
    }
?>
<div class="modal-dialog"> 
                                                <div class="modal-content"> 
                                                    <div class=""> 
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    
                                                    
                                                    <div class="modal-body">  
                                                            <div class="">
                                                                
                                                                <?php
                                                                if($type == 1){
                                                                ?>
                                                                <div class="card">
                                                        <div class="card-header bg-primary">
                                                            <h3 class="card-title text-white">Edit <?php echo $dep_d['name'];?></h3>
                                                        </div>
                                                        <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Name Of Plan</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name Of Plan" value="<?php echo $dep_d['name'];?>">
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                            
                                            <div class="form-group">
                                                <label >Minimum</label>
                                                <input type="number" class="form-control" name="min" placeholder="Minimum Deposit" value="<?php echo $dep_d['min'];?>">
                                            </div>
                                            </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label >Maximum</label>
                                                <input type="number" class="form-control" name="max" placeholder="Maximum Deposit" value="<?php echo $dep_d['max'];?>">
                                            </div>
                                            </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label >Referral Bonus</label>
                                                <input type="number" class="form-control" name="ref" placeholder="Referral Bonus" value="<?php echo $dep_d['ref'];?>">
                                            </div>
                                            </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label >Percentage Profit</label>
                                                <input type="number" class="form-control" name="profit" placeholder="Percentage Profit" value="<?php echo $dep_d['percent'];?>">
                                                <input type="hidden" name="id" value="<?php echo $dep_d['id'];?>">
                                                </div>
                                            </div>
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label >Duration</label>
                                                <div class="row">
                                                <div class="col-md-4">
                                                <select class="form-control" name="num">
                                                    <?php
                                                    for($x = 1; $x < 501;$x++){
                                                    ?>
                                                    <option <?php if($dep_d['num'] == $x){ echo 'selected';}?> value="<?php echo $x;?>"><?php echo $x;?></option>
                                                        <?php
                                                    }
                                                        ?>
                                               </select>
                                            </div>
                                                <div class="col-md-8">
                                                <select class="form-control" name="calc">
                                                    <option <?php if($dep_d['calc'] == 1){ echo 'selected';}?> value="1">Hour(s)</option>
                                                    <option <?php if($dep_d['calc'] == 24){ echo 'selected';}?> value="24">Day(s)</option>
                                                    <option <?php if($dep_d['calc'] == 720){ echo 'selected';}?> value="720">Month(s)</option>
                                                    <option <?php if($dep_d['calc'] == 8760){ echo 'selected';}?> value="8760">Year(s)</option>
                                               </select>
                                            </div>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="submit" name="update_plan" class="btn btn-primary waves-effect waves-light">Update <?php echo $dep_d['name'];?></button>
                                            </div>
                                            <br>
                                        </form>
                                    </div>
                                                    </div>
                                                            <?php
                                                                }
                                                            if($type == 2){
                                                            ?>
                                                                <div class="card">
                                                        <div class="card-header bg-primary">
                                                            <h3 class="card-title text-white">Edit <?php echo $dep_d['name'];?></h3>
                                                        </div>
                                                        <div class="card-body">
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                <label>Photo of User(optional)</label><em class='<?php if(isset($_SESSION["info"]['image'])){ echo 'text-warning';}else{ echo 'text-primary';}?>'> <?php if(isset($_SESSION["info"]['image'])){ echo $_SESSION["info"]['image'];}else{ echo '';}?></em>
                                                <div class=" mt-3">
                                                    <div>
                                                        <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick('#getcatimage')" style="height: 200px; width: 200px;">
                
              </div>
                                                            <img src="<?php if($dep_d['image'] == 1){ echo '../img/pro.jpg';}else{ echo '../images/'.$dep_d['image'];}?>" onClick="triggerClick('#getcatimage')" id="dispcatimage" class='profileDisplay' style="height: 200px; width: 200px;">
                                         </span>
                                                        <input type="file" name="image" onChange="displayImage(this,'#dispcatimage')" id="getcatimage" class="form-control" style="display:none;">
                                                        <input type="hidden" name='img' value="<?php echo $dep_d['image'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                                </div>
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Name Of User</label>
                                                <input type="text" class="form-control" name="name" placeholder="Name Of User" value="<?php echo $dep_d['name'];?>">
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                            
                                            <div class="form-group">
                                                <label >Testimony</label>
                                                <textarea type="number" class="form-control" rows="5" name="test" placeholder="Write Testimony"><?php echo $dep_d['testimony'];?></textarea>
                                                <input type="hidden" name="id" value="<?php echo $dep_d['id'];?>">
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="button" class="btn btn-pink waves-effect waves-light" data-toggle="modal" data-target="#d<?php echo $dep_d['id'];?>">Delete <?php echo $dep_d['name'];?></button>
                                            <button type="submit" name="update_test" class="btn btn-primary waves-effect waves-light">Update <?php echo $dep_d['name'];?></button>
                                            </div>
                                            <br>
                                        </form>
                                    </div>
                                                    </div>
                                                                
                                                                <?php
                                                                }
                                                            if($type == 3){
                                                            ?>
                                                               
                                                                <div class="card">
                                                        <div class="card-header bg-primary">
                                                            <h3 class="card-title text-white">Edit <?php echo $dep_d['name'];?></h3>
                                                        </div>
                                                        <div class="card-body">
                                        <form method="post" action="">
                                            <div class="row">
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label >Question</label>
                                                <input type="text" class="form-control" name="name" placeholder="Question" value="<?php echo $dep_d['question'];?>">
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                            
                                            <div class="form-group">
                                                <label >Answer</label>
                                                <textarea type="number" class="form-control" rows="5" name="answer" placeholder="Write Answer"><?php echo $dep_d['answer'];?></textarea>
                                                <input type="hidden" name="id" value="<?php echo $dep_d['id'];?>">
                                            </div>
                                            </div>
                                            </div>
                                            <div class="text-center">
                                            <button type="button" class="btn btn-pink waves-effect waves-light" data-toggle="modal" data-target="#d<?php echo $dep_d['id'];?>">Delete <?php echo $dep_d['name'];?></button>
                                            <button type="submit" name="update_faq" class="btn btn-primary waves-effect waves-light">Update <?php echo $dep_d['name'];?></button>
                                            </div>
                                            <br>
                                        </form>
                                    </div>
                                                    </div>
                                                                
                                                                <?php
                                                                }
                                                            ?>
                                                                
                                                                
                                                        </div> 
                                                    </div>
                                                    
                                                    
                                                    
                                                </div> 
                                            </div>
<?php 
}

if (! empty($_POST["setting_del"]) && ! empty($_POST["del_set_id"])) {
    $user_id = $_POST["setting_del"];
    $key = $_POST["del_set_id"];
?>

<div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Are you sure to delete?</h4>
                                                    </div>
                                                    <div class="modal-footer no-border">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">No</button>
                                                        <a href="?a=<?php echo $user_id;?>&d=<?php echo complex_para($key);?>" class="btn btn-pink waves-effect">Delete</a> 
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div>

<?php
}
?>

