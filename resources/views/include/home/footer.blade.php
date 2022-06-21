<footer id="footer">
    <div class="container footer-container">
        <div class="row">
            <div class="col-md-2 col-sm-6">
                <div class="widget">
                    <h5 style="font-family: 'B Koodak'" class="widget-title">منو</h5>
                    <ul class="menu">
                        <li><a style="font-family: 'B Koodak'" href="">خانه</a></li>
                        <li><a style="font-family: 'B Koodak'" href="#">در حال اجرا</a></li>
                        <li><a style="font-family: 'B Koodak'" href="#">پیگیری بلیت</a></li>

                    </ul>
                </div>
                <div class="widget">
                    <div class="social-links">
                        <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                        <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                        <a href="javascript:;"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="widget">
                    <h5 style="font-family: 'B Koodak'" class="widget-title">آدرس</h5>
                    <p style="font-family: 'B Koodak'">
                       تهران - تهران
                    </p>
                    <p style="font-family: 'B Koodak'">
                        <i  class="fa fa-mail"></i>Example@mail.com<br>
                        <i class="fa fa-phone"></i> + 123 456 7890
                    </p>
                </div>
            </div>

            <div class="col-md-5">
                <div class="widget">
                    <h5 style="font-family: 'B Koodak'" class="widget-title">کامنت</h5>
                    <form class="contact_form transparent">
                        <div class="row">
                            <div class="col-sm-12">
                                <input style="font-family: 'B Koodak'" type="text" class="inputValidation" name="name" placeholder="نام *">
                            </div>
                            <div class="col-sm-12">
                                <input style="font-family: 'B Koodak'" type="text" class="inputValidation" name="email" placeholder="ایمیل *">
                            </div>
                            <div class="col-sm-12 ">
                                <textarea style="font-family: 'B Koodak'" class="inputValidation" placeholder="متن *"></textarea>
                                <button style="font-family: 'B Koodak'" type="submit" class="button fill rectangle">ارسال</button>
                            </div>
                        </div>
                    </form>
                    <div class="errorMessage"></div>
                </div>
            </div>
            <div class="col-md-2">
                <?php set_post_views (get_the_ID()); ?>
                <?php echo get_post_views (get_the_ID()); ?>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row copyright-text">
                <div class="col-sm-12 text-center">
                    <p class="mv3 mvt0">&copy; Copyrights 2017 Tenguu. All rights reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>

