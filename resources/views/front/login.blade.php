@include('admin.partials.head')

    <body style="background-color:#F2EEED;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                @include('admin.partials.messages')
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div style="color:#ffffff; background-color:#E9AF64;" class="card-header"><h3 class="text-center font-weight-light my-4">Logare</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-floating mb-3 mt-5">
                                                <input name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail"
                                                type="email" placeholder="name@example.com" required />
                                                <label for="inputEmail">Adresa Email</label>
                                                @error('email')
                                                <div class="invalid-feedback">
                                                   {{ $message }}
                                                  </div>
                                                  @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input name="password" class="form-control  @error('password') is-invalid @enderror" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Parola</label>
                                                @error('password')
                                                <div class="invalid-feedback">
                                                   {{ $message }}
                                                  </div>
                                                  @enderror
                                            </div>
                                            <div class="form-check mb-3">
                                                {{-- <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Amintes</label> --}}
                                            </div>
                                            <div class="d-grid mt-4 mb-0">
                                                <button class="btn btn-block" style="color:#ffffff; background-color:#E9AF64; border-radius: 8px;"  type="submit">Logare</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">

                                        <div class="small">
                                            <button style=" background-color:#E9AF64; border-style: none; border-radius: 8px;"><a style="text-decoration: none; color: #ffffff; " class="small btn-lg" href="{{ route('password.request') }}">Am uitat Parola</a></button><br><br>
                                            <button style=" background-color:#E9AF64; border-style: none; border-radius: 8px;"><a style="text-decoration: none; color:#ffffff;" class="small btn-lg"  href="{{ route('register') }}">Nu ai Cont? Creaza-ti Cont!</a></button><br><br>
                                            <button style=" background-color:#E9AF64; border-style: none; border-radius: 8px;"><a style="text-decoration: none; color:#ffffff;" class="small btn-lg"  href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i> </a></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-center ">
                            <div class="text-muted">Copyright &copy; | Ajmal-JaiDam 2022</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>



