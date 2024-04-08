    <!-- Footer -->
    <div class="footer">
        <div class="row">
            <div class="col-md-9">
                <div class="left-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <h1>Qahwah <br />VALLEY</h1>
                                <p>The sky was cloudless and of a deep<br />
                                    dark blue spectacle before us was<br />
                                    indeed sublime.</p>
                            </div>
                            <div class="col-md-4">
                                <h4>MENU</h4>
                                <ul class="b-menu">
                                    <li>About</li>
                                    <li>Services</li>
                                    <li>Contacts</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <h4>SERVICE</h4>
                                <ul class="b-menu">
                                    <li>Pure</li>
                                    <li>High Quality</li>
                                    <li>Excellent</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="right-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>SOCIAL</h4>
                            <a target="_blank" href="{{ Settings()->fb }}"><i class="fa fa-facebook socailM"
                                    aria-hidden="true"></i></a>
                            <a target="_blank" href="{{ Settings()->tw }}"><i class="fa fa-twitter socailM"
                                    aria-hidden="true"></i></a>
                            <a target="_blank" href="{{ Settings()->ins }}"><i class="fa fa-instagram socailM"
                                    aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('front/js/wow.min.js') }}"></script>
    <script src="{{ asset('front/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
    <script>
        $(window).on('load', function () {
            // Remove loader when all page content has finished loading
            $('.myloader').fadeOut('slow', function () {
                $(this).remove();
            });
        });

    </script>
    </body>

    </html>
