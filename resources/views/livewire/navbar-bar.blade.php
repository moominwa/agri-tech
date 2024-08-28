<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<style>
    .carousel-item img {
        width: 100%;
        height: 100vh;
        object-fit: cover;
        border: none;
    }

    .rounded-circle {
        width: 200px;
        /* ปรับขนาดภาพตามที่คุณต้องการ */
        height: 200px;
        object-fit: cover;
        border: none;
    }

    .center-content {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
    }
</style>
<body>
    <main>
        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class=""
                    aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"
                    class=""></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="active"
                    aria-current="true"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item">
                    <img src="{{ asset('images/head1.jpg') }}"
                        class="d-block w-100 img-fluid" alt="First slide">
                    <div class="container">
                        {{-- <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p class="opacity-75">Some representative placeholder content for the first slide of the
                                carousel.</p>
                        </div> --}}
                    </div>
                </div>
                <div class="carousel-item">
                     <img src="{{ asset('images/head2.jpg') }}"
                        class="d-block w-100 img-fluid" alt="Second slide">
                    <div class="container">
                        {{-- <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                        </div> --}}
                    </div>
                </div>
                <div class="carousel-item active">
                       <img src="{{ asset('images/head3.jpg') }}"
                        class="d-block w-100 img-fluid" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>ยินดีต้อนรับ</h1>
                            <p>การแข่งขันฟุตบอลคณะเกษตรศาสตร์และเทคโนโลยี Agri-Tech CUP Anti Drugs</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="container marketing">


            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">การแข่งขันฟุตบอลคณะเกษตรศาสตร์และเทคโนโลยีต้านภัยยาเสพติด <span
                            class="text-body-secondary"></span></h2>
                    <p class="lead">สภาพการณ์ในยุคปัจจุบัน ฟุตบอลนับว่ามีความสําคัญเพิ่มมากขึ้นเป็นลําดับ โดยเฉพาะอย่างยิ่งใน
                        กลุ่มเด็กและเยาวชน การเล่นฟุตบอลทําให้เกิดการพัฒนาทางด้านร่างกาย จิตใจ อารมณ์ สังคม และ
                        สติปัญญา นอกจากนี้ ยังเป็นการใช้เวลาว่างให้เกิดประโยชน์ รวมทั้งการหลีกเลี่ยงอบายมุขและยาเสพติด</p>
                </div>
                <div class="col-md-5">
                       <img src="{{ asset('images/head5.jpg') }}"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        alt="Featurette image">
                </div>
            </div>

            <hr class="featurette-divider">
            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1">คณะเกษตรศาสตร์และเทคโนโลยี <span
                            class="text-body-secondary"></span></h2>
                    <p class="lead">ได้มีระบบการจัดการแข่งขันฟุตบอลคณะ
                        เกษตรศาสตร์และเทคโนโลยี Agri-Tech Cup เพื่อนําไปใช้ในการจัดการการแข่งขันฟุตบอล Agri-Tech
                        Cup ให้เกิดประโยชน์ เพื่อเพิ่มช่องทางการประชาสัมพันธ์สําหรับนักศึกษาได้อย่างถูกต้องให้เป็นปัจจุบัน
                        ทันสมัย</p>
                </div>
                <div class="col-md-5 order-md-1">
                       <img src="{{ asset('images/head6.jpg') }}"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        alt="Featurette image">
                </div>
            </div>


        </div>

        <footer class="container text-center ">
            <p>ติดต่อ : <a href="https://www.facebook.com/agri.surin" target="_blank" class="facebook-icon">
                    <i class="fab fa-facebook"> Facebook</i>
                </a>
            </p>
        </footer>


    </main>
</body>
</html>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
