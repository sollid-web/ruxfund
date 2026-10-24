<!-- testimonials -->
<section class="w3l-clients-1" id="testimonials">
    <!-- /grids -->
    <div class="cusrtomer-layout py-5">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="heading align-self text-center">
                <h6 class="title-small">Testimonials</h6>
                <h3 class="title-big mb-4">What peoples say</h3>
            </div>
            <!-- /grids -->
            <div class="testimonial-row py-md-4">
                <div id="owl-demo2" class="owl-two owl-carousel owl-theme mb-md-3 mb-sm-5 mb-4">
                    
                    
                    <?php
                $loop_test = loop_table_limit_rand($con, 'test', 30);
                foreach ($loop_test as $test) {
                ?>
                    
                    
                    <div class="item">
                        <div class="testimonial-content">
                            <div class="testimonial">
                                <blockquote>
                                    <q><?php echo $test['testimony'];?></q>
                                </blockquote>
                                <div class="testi-des">
                                    <a href="#url" class="testi-img">
                                        <img src="<?php if($test['image'] == 1){ echo 'img/pro.jpg';}else{ echo 'images/'.$test['image'];}?>" alt="<?php echo $test['name'];?>" alt="" class="radius-image img-fluid">
                                    </a>
                                    <div class="peopl align-self">
                                        <h3><?php echo $test['name'];?></h3>
                                        <p class="identity">Investor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                     <?php
                }
                ?>
                    
                    
                    
                </div>
            </div>
        </div>
        <!-- /grids -->
    </div>
    <!-- //grids -->
</section>
<!-- //testimonials -->