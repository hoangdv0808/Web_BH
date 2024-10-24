@extends('user.layour.master')
@section('main-user')
    <div class="ready banner-padding bg-img bg-fixed valign" style="background-image: url({{ asset('asset')}}/images/slider/3.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-right">
                        <div class="title mt-td">
                            <h1 class="mb-0">Hỗ trợ</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12"><span>Thông tin</span>
                    <h2>Liên hệ với văn phòng của chúng tôi</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row mb-60">
                        <div class="col-md-2"><span class="line-one"></span></div>
                        <div class="col-md-4 mb-30">
                            <p>Bạn có bất kì thắc mắc nào về sản phẩm ? Hãy liên hệ cho chúng tôi!</p>
                            <p><b>Số Điện Thoại</b> (+84) 389 502 096</p>
                            <p><b>Email :</b> hoangdang8826@gmail.com</p>
                            <p><b>Địa Chỉ :</b> Hà Nội</p>
                        </div>
                        <div class="col-md-5 offset-md-1">
                            <h3>Hỗ trợ nhanh</h3>
                            <form class="contact__form" method="post" action="mail.php">
                                <!-- Form elements-->
                                <div class="row">
                                    <div class="col-md-5 mr-5 contact-dvh form-group">
                                        <input name="name" type="text" placeholder="Tên Của Bạn *" required="">
                                    </div>
                                    <div class="col-md-5 ml-3 contact-dvh form-group">
                                        <input name="email" type="email" placeholder=" Email *" required="">
                                    </div>
                                    <div class="col-md-5 mr-5 contact-dvh form-group">
                                        <input name="phone" type="text" placeholder="Số Điện Thoại *" required="">
                                    </div>
                                    <div class="col-md-5 ml-3 contact-dvh form-group">
                                        <input name="subject" type="text" placeholder="Vấn Đề *" required="">
                                    </div>
                                    <div class="col-md-12 contact-dvh form-group">
                                        <textarea id="message" name="message" cols="30" rows="4" placeholder="Lời Nhắn *" required=""></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-primary submit rounded-0">Gửi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13419.040333881774!2d-79.93218134282569!3d32.77209999120473!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88fe7a1ae84ff639%3A0xe5c782f71924a526!2s24%20King%20St%2C%20Charleston%2C%20SC%2029401%2C%20Amerika%20Birle%C5%9Fik%20Devletleri!5e0!3m2!1str!2str!4v1635894790855!5m2!1str!2str"
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
