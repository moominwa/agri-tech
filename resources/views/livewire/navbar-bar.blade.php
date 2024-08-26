<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                    <img src="{{ asset('images/Apr81.jpg') }}"
                        class="d-block w-100 img-fluid" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1>Example headline.</h1>
                            <p class="opacity-75">Some representative placeholder content for the first slide of the
                                carousel.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                     <img src="{{ asset('images/Apr81.jpg') }}"
                        class="d-block w-100 img-fluid" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Another example headline.</h1>
                            <p>Some representative placeholder content for the second slide of the carousel.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item active">
                       <img src="{{ asset('images/Apr81.jpg') }}"
                        class="d-block w-100 img-fluid" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1>One more for good measure.</h1>
                            <p>Some representative placeholder content for the third slide of this carousel.</p>
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
                    <h2 class="featurette-heading fw-normal lh-1">First featurette heading. <span
                            class="text-body-secondary">It’ll blow your mind.</span></h2>
                    <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting
                        prose here.</p>
                </div>
                <div class="col-md-5">
                       <img src="{{ asset('images/Apr81.jpg') }}"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        alt="Featurette image">
                </div>
            </div>

            <hr class="featurette-divider">
            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading fw-normal lh-1">Oh yeah, it’s that good. <span
                            class="text-body-secondary">See for yourself.</span></h2>
                    <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of
                        how this layout would work with some actual real-world content in place.</p>
                </div>
                <div class="col-md-5 order-md-1">
                       <img src="{{ asset('images/Apr81.jpg') }}"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        alt="Featurette image">
                </div>
            </div>

            <hr class="featurette-divider">
            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span
                            class="text-body-secondary">Checkmate.</span></h2>
                    <p class="lead">And yes, this is the last block of representative placeholder content. Again, not
                        really intended to be actually read, simply here to give you a better view of what this would look
                        like with some actual content. Your content.</p>
                </div>
                <div class="col-md-5">
                     <img src="{{ asset('images/Apr81.jpg') }}"
                        class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                        alt="Featurette image">
                </div>
            </div>
            <hr class="featurette-divider">
            <div class="row justify-content-center">
                <div class="col-lg-4 center-content">
                    <img src="{{ asset('images/Apr81.jpg') }}"
                        class="bd-placeholder-img rounded-circle img-fluid" alt="Generic placeholder image">
                    <h2 class="fw-normal">Weerapon</h2>
                    <p>Some representative placeholder content for the three columns of text below the carousel. This is the
                        first column.</p>
                </div>
                <div class="col-lg-4 center-content">
                    <img src="{{ asset('images/Apr81.jpg') }}"
                    class="bd-placeholder-img rounded-circle img-fluid" alt="Generic placeholder image">
                    <h2 class="fw-normal">Thanakorn</h2>
                    <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second
                        column.</p>
                </div>
            </div>
            <hr class="featurette-divider">
        </div>

        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>© 2017–2024 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
        </footer>
    </main>
</body>
</html>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
