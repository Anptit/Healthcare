<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>Patient's appointment</title>
</head>

<body>
    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="https://www.kingdom.co.uk/hubfs/What-Healthcare-Staffing-Solutions-Are-Available-For-Healthcare-Providers-1.jpg"
                                    alt="Sample photo" class="img-fluid h-100"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5 text-uppercase text-center">Patient's appointment</h3>

                                    <form action="{{ route('admin.appointment-confirm-handle') }}" method="POST">
                                        @csrf
                                        <div class="d-flex flex-column">
                                            <div class="col-md-6 w-100 mt-3">
                                                <input type="text" class="form-control" placeholder="Name"
                                                    name="name" value="{{ $appointment->first_name . ' ' . $appointment->last_name }}">
                                            </div>
                                            <div class="col-md-6 w-100 mt-3">
                                                <input type="email" class="form-control" placeholder="Enter Email"
                                                    name="email" value="{{ $appointment->email }}">
                                            </div>
                                            <div class="col-md-6 w-100 mt-3">
                                                <input type="tel" class="form-control" placeholder="Phone Number"
                                                    name="phone" value="{{ $appointment->phone }}">
                                            </div>
                                            <div class="col-md-6 w-100 mt-3">
                                                <input type="date" class="form-control" name="date" value="{{ $appointment->date }}">
                                            </div>
                                            <div class="col-md-6 w-100 mt-3">
                                                <input type="time" class="form-control" name="time" value="{{ $appointment->time }}">
                                            </div>
                                            <div class="col-md-6 w-100 mt-3">
                                                <input type="text" class="form-control" placeholder="Enter Address"
                                                    name="address" value="{{ $appointment->address }}">
                                            </div>
                                            <div class="col-12 mt-3">
                                                <input type="text" class="form-control" placeholder="Purpose of appointment" 
                                                name="disease" value="{{ $appointment->disease }}">
                                            </div>
                                            <div class="col-12 mt-5">
                                                <button type="submit" class="btn btn-primary float-end">
                                                    Confirm
                                                </button>
                                                <a class="text-decoration-none text-dark btn btn-outline-secondary float-end me-2"
                                                    href=" {{ route('admin.home') }} ">Cancel</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
