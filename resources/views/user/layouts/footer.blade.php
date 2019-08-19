<footer>
    <style>
        #buttonScrollTop{
            border-radius: 50%;
            padding: 15px 20px;
            right: 30px;
            bottom:50px;
            position:fixed;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            display: none;
        }
        #buttonScrollTop:active{
            outline: none;
        }
        .show{
            display: block!important;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fas fa-circle fa-stack-2x"></i>
                              <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fas fa-circle fa-stack-2x"></i>
                              <i class="fab fa-linkedin-in fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fas fa-circle fa-stack-2x"></i>
                              <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Blog 2019</p>
            </div>
        </div>
    </div>

    <!-- Button Scroll Top -->
    <button id="buttonScrollTop" type="button" class="btn btn-danger">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('user/vendor/jquery/jquery.js')}}"></script>
    <script src="{{asset('user/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('user/js/clean-blog.js')}}"></script>

    <script>
        $(document).ready(function () {
                var scrollTop = $('#buttonScrollTop');

                $(window).scroll(function() {
                    if ($(window).scrollTop() > 300) {
                        scrollTop.addClass('show');
                    } else {
                        scrollTop.removeClass('show');
                    }
                });

            scrollTop.on('click', function(e) {
                    e.preventDefault();
                    $('html, body').animate({scrollTop:0}, '300');
                });
        })
    </script>
</footer>

