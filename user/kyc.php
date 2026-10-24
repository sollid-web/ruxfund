<?php
include('../includes/server.php');
include('../includes/functions.php');
include 'includes/checkuser.php';
kyc($con,$getsite);

$page = array('id'=>3,'title'=>'KYC | '.$getuser['username'].'');
$pagename = 'KYC Verification';
$loopkyccheck = get_data($con, 'users', 'username', $getuser['username'])['kyc'];
if($loopkyccheck == 1){
        $_SESSION["info"]['info']='Your KYC have been verified.';
        $_SESSION["time"]=time();
        $_SESSION["theme"]="alert-warning";
        header('location: index.php');
        }
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
                            <div class="nk-block-head nk-block-head-sm">
                                <div class="nk-block-between g-3">
                                    <div class="nk-block-head-content">
                                        <h3 class="nk-block-title page-title">KYCs / <strong class="text-primary small"><?php echo $getuser['username'];?></strong></h3>
                                        <div class="nk-block-des text-soft">
                                            <ul class="list-inline">
                                                <li>Application ID: <span class="text-base"><?php echo $getuser['username'];?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <a href="settings.php" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                        <a href="settings.php" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head -->
                            <div class="nk-block">
                                <div class="row gy-5">
                                    <div class="col-lg-5">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h5 class="nk-block-title title">KYC Application</h5>
                                            </div>
                                        </div>
                                        <!-- .nk-block-head -->
                                        
                                        
                                        <div class="col-lg-6">
                                            <div class="card card-bordered h-100">
                                                <div class="card-inner">
                                                    <div class="card-head">
                                                        <h5 class="card-title">KYC Form</h5>
                                                    </div>
                                                    <?php include 'includes/alert.php';?>
                                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group">
                                                            <label class="form-label" for="cf-full-name">Enter Full Name</label>
                                                            <input type="text" name="name" class="form-control" id="cf-full-name" placeholder="">
                                                        </div>
                                                            <div class="form-group">
                                                            <label class="form-label" for="cf-full-name">Enter Email Address</label>
                                                            <input type="email" name="email" class="form-control" id="cf-full-name" placeholder="">
                                                        </div>
                                                            <div class="form-group">
                                                            <label class="form-label" for="cf-full-name">Enter Phone Number</label>
                                                            <input type="text" name="phone" class="form-control" id="cf-full-name" placeholder="">
                                                        </div>
                                                        <input type="text" name="userid" value="<?php echo $getuser['id'];?>" hidden>
                                                            <div class="form-group">
                                                            <label class="form-label" for="cf-full-name">Enter Residential Address</label>
                                                            <input type="text" name="address" class="form-control" id="cf-full-name" placeholder="">
                                                        </div>
                                                            <div class="form-group">
                                                            <label class="form-label" for="cf-full-name">State</label>
                                                            <input type="text" name="state" class="form-control" id="cf-full-name" placeholder="">
                                                        </div>
                                                         <div class="form-group">
                                                            <label class="form-label" for="default-06">Country</label>
                                                            <div class="form-control-wrap ">
                                                                <div class="form-control-select">
                                                                    <select name="country" class="form-control" id="default-06">
                                                                        <option value="<?php echo $getuser['country'];?>"><?php echo $getuser['country'];?></option>
                                                                        <?php
                                                                          getcountries();
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            
                                                        <div><small class="card-description">
                                                            <h6> Upload Here Any Of The Below Document</h6>
                                                            <ul class="list-group">
                                                            <li>PASSPORT</li>
                                                            <li>National ID (Front Side)</li>
                                                            <li>Driving Licence</li>
                                                                   </ul>
                                                        </small></div>  
                                                            
                                                        <div style="margin-top: 10px" class="col-sm-6">
                                                        <div>
	<label for="avatar">Choose image:</label>
	<input type="file" name="file" id="myInput" 
		   accept="image/png, image/jpeg">
</div>
<div id="original">

</div>
                                                       </div>   
                                                           
                                                            <div style="margin-top: 20px" class="form-group">
                                                            <button type="submit" name="kyc"  class="btn btn-lg btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .nk-block -->
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
    <script>
        console.clear();

async function getBase64(file) {
	return new Promise(function(res, rej) {
		const reader = new FileReader();
		reader.readAsDataURL(file);
		reader.onload = function() {
			res(reader.result);
		};
		reader.onerror = function(error) {
			rej("Error: ", error);
		};
	});
}

async function compress(dataURL, quality, maxHeight) {
	return new Promise(function(res, rej) {
		try{	
			const img = new Image();
			img.src = dataURL;
			img.onload = function(e) {
				try{
					const sWidth = e.target.width;
					const sHeight = e.target.height;
					let dWidth = sWidth;
					let dHeight = sHeight;
					if(dHeight > maxHeight){
						const ratio = dHeight/dWidth;
						dHeight = maxHeight;
						dWidth = maxHeight / ratio;
					}
					const canvas = document.createElement("canvas");
					canvas.width = dWidth;
					canvas.height = dHeight;

					canvas.getContext("2d")
						.drawImage(e.target, 0, 0, dWidth, dHeight);	
					const cStr64 = canvas.toDataURL("image/jpeg", quality);
					res(cStr64);
				} catch (e) { rej("Fail" + e) };
			};
		} catch (e) { rej("Fail" + e) };
	});
}

document
	.getElementById("myInput")
	.addEventListener("change", async function(e) {
		if (!e.target.files[0]) {
			document.getElementById("original")
				.removeChild(document.getElementById("append").firstElementChild);
			document.getElementById("compressed")
				.removeChild(document.getElementById("compressed").firstElementChild);
			return;
		}
	
		
		const original = document.createElement("img");
		original.src = await getBase64(e.target.files[0]);
		
		const compressed = document.createElement("img");
		compressed.src = await compress(original.src, 0.45, 1080);
		
		console.log(original.src)
		console.log(compressed.src)
	
		let existing = document.getElementById("original").firstElementChild;
		if (existing) document.getElementById("original").replaceChild(original, existing);
		else document.getElementById("original").appendChild(original);
		existing = document.getElementById("compressed").firstElementChild;
		if (existing) document.getElementById("compressed").replaceChild(compressed, existing);
		else document.getElementById("compressed").appendChild(compressed);
	});

    </script>
    <!-- JavaScript @e -->
</body>

</html>