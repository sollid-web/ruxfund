<div class="row">
                        </div>
<?php if(isset($_SESSION['time']) && (time()-$_SESSION['time'])<6){?>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="alert text-center <?php echo $_SESSION["theme"];?> alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                <?php echo $_SESSION["info"]['info'];?>
                                        </div>
                            </div>
                        </div>
                        <?php
                        
                        }else{
                            unset($_SESSION['time']);
                            unset($_SESSION['info']);
                            unset($_SESSION['theme']);
                        }
                        ?>
<?php
if($cccc!=1){
?>

<?php
}
?>
