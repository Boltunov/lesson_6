@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <div class="btn-toolbar mb-2 mb-md-0">

            <!doctype html>
            <html lang="en">
            <head>
                <meta charset="utf-8">
                <title>Checkout example · Bootstrap v5.1</title>

                <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
                <meta name="theme-color" content="#7952b3">

                <style>
                    .bd-placeholder-img {
                        font-size: 1.125rem;
                        text-anchor: middle;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        user-select: none;
                    }

                    @media (min-width: 768px) {
                        .bd-placeholder-img-lg {
                            font-size: 3.5rem;
                        }
                    }
                </style>

                <!-- Custom styles for this template -->
                <link href="{{asset('assets/css/form-validation.css')}}" rel="stylesheet">
            </head>
            <body class="bg-light">

            <div class="container">
                <main>
                    <h1 class="h2">Регистрация</h1>
                    <div class="btn-group me-2">
                        <a href="{{ route('admin.registration.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Отправить данные</a>
                    </div>

                    @yield('content')
                    <div class="py-5 text-center">
                        <h2>Registration form</h2>
                        <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
                    </div>

                    <div class="row g-5">
                        <div class="col-md-7 col-lg-8">
                            <h4 class="mb-3">Form</h4>
                            <form class="needs-validation" novalidate>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">First name</label>
                                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                        <div class="invalid-feedback">
                                            Valid first name is required.
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">Last name</label>
                                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                        <div class="invalid-feedback">
                                            Valid last name is required.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="username" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text">@</span>
                                            <input type="text" class="form-control" id="username" placeholder="Username" required>
                                            <div class="invalid-feedback">
                                                Your username is required.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                                        <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                        <div class="invalid-feedback">
                                            Please enter a valid email address for shipping updates.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="address" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                                        <div class="invalid-feedback">
                                            Please enter your shipping address.
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                                        <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                                    </div>

                                    <div class="col-md-5">
                                        <label for="country" class="form-label">Country</label>
                                        <select class="form-select" id="country" required>
                                            <option value="">Choose...</option>
                                            <option>United States</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="state" class="form-label">State</label>
                                        <select class="form-select" id="state" required>
                                            <option value="">Choose...</option>
                                            <option>California</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="zip" class="form-label">Zip</label>
                                        <input type="text" class="form-control" id="zip" placeholder="" required>
                                        <div class="invalid-feedback">
                                            Zip code required.
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="same-address">
                                    <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
                                </div>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="save-info">
                                    <label class="form-check-label" for="save-info">Save this information for next time</label>
                                </div>

                                <hr class="my-4">

                                <hr class="my-4">

                                <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                            </form>
                        </div>
                    </div>
                </main>

                <footer class="my-5 pt-5 text-muted text-center text-small">
                    <p class="mb-1">&copy; 2017–2021 Company Name</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Privacy</a></li>
                        <li class="list-inline-item"><a href="#">Terms</a></li>
                        <li class="list-inline-item"><a href="#">Support</a></li>
                    </ul>
                </footer>
            </div>

            <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

            <script src="{{asset('assets/js/form-validation.js')}}"></script>
            </body>
            </html>
        </div>
    </div>
@endsection
