<?php
if(isset($_SESSION['time']) && (time() - $_SESSION['time']) < 6){
?>
<div class="alert <?php echo isset($_SESSION['theme']) ? $_SESSION['theme'] : 'alert-info';?> alert-dismissible fade show mb-2" role="alert">
                        <?php
            echo isset($_SESSION['info']['info']) ? $_SESSION['info']['info'] : '';
    ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
<?php
}else {
        unset($_SESSION['theme']);
        unset($_SESSION['time']);
        unset($_SESSION["info"]);
        unset($_SESSION["reg"]);
    }
    
?>