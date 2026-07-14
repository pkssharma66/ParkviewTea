<!DOCTYPE html>

<html>

<head>

    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <div class="container">

        <div class="row justify-content-center vh-100 align-items-center">

            <div class="col-md-4">

                <div class="card shadow">

                    <div class="card-header bg-success text-white">

                        <h4>

                            Park View Tea Admin

                        </h4>

                    </div>

                    <div class="card-body">
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('admin.authenticate') }}">

                            @csrf

                            <div class="mb-3">

                                <label>Email</label>

                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    class="form-control"
                                    required>

                            </div>

                            <div class="mb-3">

                                <label>Password</label>

                                <input
                                    type="password"
                                    name="password"
                                    class="form-control"
                                    required>

                            </div>

                            <button class="btn btn-success w-100">

                                Login

                            </button>

                        </form>

                    </div>
                    <div class="text-end mt-2">
                        <a href="{{ route('admin.forgot.password') }}">
                            Forgot Password?
                        </a>
                    </div>

                </div>

            </div>

        </div>


    </div>

</body>

</html>