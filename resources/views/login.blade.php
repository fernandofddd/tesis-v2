<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .gradient-custom {
            /* fallback for old browsers */
            background: #6a11cb;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
        }
        .textMargin{
            margin: 2rem 0;
        }
    </style>
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-80">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <form class="mb-md-5 mt-md-4 pb-5" action="{{route('validar')}}" method="post">
                                
                                <h2 class="fw-bold mb-2 text-uppercase textMargin">Login</h2>
                                @csrf 
                                <div class="form-outline form-white mb-4">
                                    <label class="form-label w-100 text-start" for="typeEmailX">Email</label>
                                    <input type="email" id="typeEmailX" name="email" placeholder="Correo" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline form-white  mb-4">
                                    <label class="form-label w-100 text-start" for="typePasswordX">Password</label>
                                    <input type="password" id="typePasswordX" name="password" placeholder="Contraseña" class="form-control form-control-lg" />
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5 mt-5" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>