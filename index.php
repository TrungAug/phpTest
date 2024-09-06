<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container mt-3">
        <div class="row" style="border: 1px solid green;">
            <div class="col-8">
                <form id="contactForm" action="result.php" method="POST">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="title">
                                <h4 class="text-primary">Send us a Message</h4>
                            </div>
                            <div class="icon">
                                <i class="bi bi-envelope-at text-info"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="yourName" class="form-label text-muted">Your Name</label>
                                        <input type="text" class="form-control" id="yourName" name="yourName" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="yourEmail" class="form-label text-muted">Email Address</label>
                                        <input type="email" class="form-control require-valid" id="yourEmail" placeholder="name@example.com" name="yourEmail" require>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="yourPhone" class="form-label text-muted">Phone</label>
                                        <input type="text" class="form-control require-valid" id="yourPhone" name="yourPhone" placeholder="Your phone number" require>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="yourCompany" class="form-label text-muted">Company</label>
                                        <input type="text" class="form-control" name="yourCompany" id="yourCompany" placeholder="Your Company">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="yourMessage" class="form-label text-muted">Message</label>
                                        <textarea class="form-control" name="yourMessage" id="yourMessage" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-4 bg-primary text-white d-flex flex-column">
                <div class="text-center mb-3">
                    <h4 class="title-info">Contact Information</h4>
                </div>
                <div class="row mb-3 p-3">
                    <div class="col-auto d-flex align-items-center">
                        <i class="bi bi-geo-alt "></i>
                    </div>
                    <div class="col p-2">
                        <p class="m-0">360 King Street Feasterville Trevose, PA 19053</p>
                    </div>
                </div>
                <div class="row mb-3 p-3">
                    <div class="col-auto d-flex align-items-center">
                        <i class="bi bi-phone-vibrate"></i>
                    </div>
                    <div class="col p-2">
                        <p class="m-0">(800) 900-200-300</p>
                    </div>
                </div>
                <div class="row mb-3 p-3">
                    <div class="col-auto d-flex align-items-center">
                        <i class="bi bi-envelope-arrow-up"></i>
                    </div>
                    <div class="col p-2">
                        <p class="m-0">trung2894@gmail.com</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-auto d-flex align-items-center">
                        <i class="bi bi-twitter"></i>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                        <i class="bi bi-linkedin"></i>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                        <i class="bi bi-instagram"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.min.js"></script>
    <script>
        $('.input-phoneus').mask('(000) 000-000-000');
    </script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();
            document.querySelectorAll('.require-valid').forEach(function(input) {
                input.classList.remove('invalid');
            });

            var name = document.getElementById('yourName').value;
            var email = document.getElementById('yourEmail').value;
            var phone = document.getElementById('yourPhone').value;
            var company = document.getElementById('yourCompany').value;
            var message = document.getElementById('yourMessage').value;

            var valid = true;

            // if (!name) {
            //     valid = false;
            //     document.getElementById('yourName').classList.add('invalid');
            // }

            if (!email || !/\S+@\S+\.\S+/.test(email)) {
                valid = false;
                document.getElementById('yourEmail').classList.add('invalid');
            }

            if (!phone || !/^\d{10,15}$/.test(phone)) {
                valid = false;
                document.getElementById('yourPhone').classList.add('invalid');
            }

            if (!valid) {
                Swal.fire({
                    icon: 'error',
                    title: 'Face-plant!',
                    text: 'Ooops, something went wrong',
                    confirmButtonText: 'Try Again',
                });
            } else {
                this.submit();
            }
        });
    </script>
</body>

</html>