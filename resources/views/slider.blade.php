<section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                      <div class="slide_sec">
                          <div class="swiper-container">

                            <div class="swiper-wrapper">

                                 <?php 
                            $all_published_slider = DB::table('tbl_slider')->where('publication_status',1)->get();
                            foreach($all_published_slider as $slider_all_data){
                        ?>
                            <div class="swiper-slide"><img src="{{ URL::to($slider_all_data->slider_image) }}"></div>
                            <?php
                                }
                            ?>
                            
                            </div>

                            <div class="swiper-pagination"></div>

                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            </div>
                      </div>
            </div>
        </div>
    </div>
    </section><!--/slider-->