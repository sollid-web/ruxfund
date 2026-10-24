<div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="../images/chat.png" alt="" class="thumb-md rounded-circle" width="30px" height="auto">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Admin
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="?logout=1" class="dropdown-item"><i class="md md-settings-power mr-2"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0"><?php echo $getsite['name'];?></p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="flower.php" class="waves-effect <?php if($activemenu==1){ echo 'active-menu';}?>"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop <?php if($activemenu==2){ echo 'active-menu';}?>"><i class="md md-account-child"></i> <span> Members </span> <span class="pull-right"><i class="md md-remove"></i></span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <?php
                                    if($user === 1){
                                    ?>
                                    <li class="active"><a href="user-det.php?u=<?php echo complex_para($user_data['id'])?>" ><?php echo $user_data['username'];?></a></li>
                                    <?php
                                    }
                                    ?>
                                    <li class="<?php if($sub === 2){ echo 'active';}?>"><a href="users.php?a=2" >All Accounts</a></li>
                                    <li class="<?php if($sub === 1){ echo 'active';}?>"><a href="users.php?a=1">Active Accounts</a></li>
                                    <li class="<?php if($sub === 0){ echo 'active';}?>"><a href="users.php?a=0">Deactivated Accounts</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop <?php if($activemenu==3){ echo 'active-menu';}?>"><i class="md md-forward"></i> <span> Deposits </span> <span class="pull-right"><i class="md md-remove"></i></span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <li class="<?php if($dsub === 1){ echo 'active';}?>"><a href="deposit.php?a=1" >All Deposits</a></li>
                                    <li class="<?php if($dsub === 2){ echo 'active';}?>"><a href="deposit.php?a=2" >Active Deposits</a></li>
                                    <li class="<?php if($dsub === 3){ echo 'active';}?>"><a href="deposit.php?a=3" >Completed Deposits</a></li>
                                    <li class="<?php if($dsub === 4){ echo 'active';}?>"><a href="deposit.php?a=4" >Pending Deposits</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop <?php if($activemenu==4){ echo 'active-menu';}?>"><i class="md md-reply"></i> <span> Withdrawal </span> <span class="pull-right"><i class="md md-remove"></i></span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <li class="<?php if($wsub === 1){ echo 'active';}?>"><a href="withdraw.php?a=1">All Withdrawal</a></li>
                                    <li class="<?php if($wsub === 2){ echo 'active';}?>"><a href="withdraw.php?a=2">Completed Withdrawal</a></li>
                                    <li class="<?php if($wsub === 3){ echo 'active';}?>"><a href="withdraw.php?a=3">Pending Withdrawal</a></li>
                                </ul>
                            </li>
                            
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop <?php if($activemenu==5){ echo 'active-menu';}?>"><i class="md md-repeat"></i> <span> Transactions </span> <span class="pull-right"><i class="md md-remove"></i></span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <li class="<?php if($tsub === 1){ echo 'active';}?>"><a href="transaction.php?a=1">All Transactions</a></li>
                                    <li class="<?php if($tsub === 2){ echo 'active';}?>"><a href="transaction.php?a=2">Completed Transactions</a></li>
                                    <li class="<?php if($tsub === 3){ echo 'active';}?>"><a href="transaction.php?a=3">Pending Transactions</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop <?php if($activemenu==6){ echo 'active-menu';}?>"><i class="md md-repeat"></i> <span> Settings </span> <span class="pull-right"><i class="md md-remove"></i></span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <li class="<?php if($ssub === 1){ echo 'active';}?>"><a href="setting.php?a=1">Deposit Plans</a></li>
                                    <li class="<?php if($ssub === 2){ echo 'active';}?>"><a href="setting.php?a=2">Add Testimonials</a></li>
                                    <li class="<?php if($ssub === 3){ echo 'active';}?>"><a href="setting.php?a=3">Add FAQs</a></li>
                                    <li class="<?php if($ssub === 4){ echo 'active';}?>"><a href="setting.php?a=4">Set Deposit/Withdrawal Charges</a></li>
                                    <li class="<?php if($ssub === 5){ echo 'active';}?>"><a href="setting.php?a=5">Extra Statistics</a></li>
                                </ul>
                            </li>
                            
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop <?php if($activemenu==7){ echo 'active-menu';}?>"><i class="md md-redeem"></i> <span> Reward </span> <span class="pull-right"><i class="md md-remove"></i></span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <li class="<?php if($bsub === 1){ echo 'active';}?>"><a href="bonus.php?a=1">Send Bonus</a></li>
                                    <li class="<?php if($bsub === 2){ echo 'active';}?>"><a href="bonus.php?a=2">Send Penalty</a></li>
                                </ul>
                            </li>
                            
                            <li class="has_sub">
                                <a href="#" class="waves-effect subdrop <?php if($activemenu==8){ echo 'active-menu';}?>"><i class="md md-mail"></i> <span> Message </span> <span class="pull-right"><i class="md md-remove"></i></span></a>
                                <ul class="list-unstyled" style="display: block;">
                                    <li class="<?php if($msub === 1){ echo 'active';}?>"><a href="msg.php?a=1">Read Messages</a></li>
                                    <li class="<?php if($msub === 2){ echo 'active';}?>"><a href="msg.php?a=2">Send Bulk Mail</a></li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="kyc.php" class="waves-effect"><i class="md md-list"></i><span> KYC Applications </span></a>
                            </li>
                            <li>
                                <a href="?logout=1" class="waves-effect"><i class="md md-settings-power mr-2"></i><span> Logout </span></a>
                            </li>
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>