@include('admin.partials.head')

<body class="bg-secondary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header" style="color:#ffffff; background-color:#E9AF64;"><h3 class="text-center font-weight-light my-4">Creare Cont</h3></div>
                                <div class="card-body">
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="name" class="form-control @error('name') is-invalid @enderror" id="inputFirstName" type="text" placeholder="Enter your first name" required value="{{ old('name') }}"/>
                                                    <label for="inputFirstName">Nume</label>
                                                </div>
                                                @error('name')
                                                <div class="invalid-feedback">
                                                   {{ $message }}
                                                  </div>
                                                  @enderror
                                            </div>
                                            <div class="col-md-12">

                                                <div class="form-floating  mt-3">
                                                    <input name="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email" placeholder="name@example.com" value="{{ old('email') }}" required />
                                                    <label for="inputEmail">Adresa Email</label>
                                                </div>
                                                @error('email')
                                                <div class="invalid-feedback">
                                                   {{ $message }}
                                                  </div>
                                                  @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating mt-3">
                                                    <input name="phone" class="form-control @error('phone') is-invalid @enderror" id="inputLastName" type="text" placeholder="Enter your phone" value="{{ old('phone') }}" required />
                                                    <label for="inputLastName">Telefon</label>
                                                    @error('phone')
                                                <div class="invalid-feedback">
                                                   {{ $message }}
                                                  </div>
                                                  @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword" type="password" placeholder="Create a password" />
                                                    <label for="inputPassword">Parola</label>
                                                    @error('password')
                                                <div class="invalid-feedback">
                                                   {{ $message }}
                                                  </div>
                                                  @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-floating mt-3">
                                                    <input name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                                                    <label for="inputPasswordConfirm">Confirma Parola</label>
                                                    @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                   {{ $message }}
                                                  </div>
                                                  @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                {{-- <button type="submit" class="btn btn-primary btn-block" >Creare Cont</a> --}}
                                                <button type="submit" class="btn btn-block" style="color:#ffffff; background-color:#E9AF64; border-radius: 8px;">Creare Cont</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">
                                        <button style=" background-color:#E9AF64; border-style: none; border-radius: 8px;">
                                            <a style="text-decoration: none; color: #ffffff; " class="small btn-lg" href="{{ route('login') }}">Ai deja Cont? Logheaza-te</a>
                                        </button>
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
                    <div class="d-flex align-items-center justify-content-center">
                        <div class="text-muted">Copyright &copy; | Ajmal-JaiDam 2022</div>
                        {{-- <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div> --}}
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
