<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Foody Me') }}</title>

    {{-- <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link href="{{ asset('../build/assets/app-1dbb9ad6.css') }}" rel="stylesheet">
    <script src="{{ asset('../build/assets/app-c75e0372.js') }}" defer></script>
</head>

<body class="bg-white">
    <x-navbar color="bg-light" />
    <x-banner />
    <x-simple-product :products="$products" />

    <div class="container bg-orange">
        <div class="row justify-content-between align-items-center mb-4">
            <div class="col-lg-6 text-center">
                <h1 class="display-5 mb-3">Why we are unique?</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos delectus cupiditate optio, totam
                    quis dolorum?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui nulla dolores animi, excepturi
                    consequatur autem harum praesentium sint velit consectetur?</p>
            </div>
            <div class="col-lg-6 d-lg-block d-none">
                <img src="./assets/chef.jpg" alt="" class="img-fluid" draggable="true">
            </div>
        </div>

        <div class="row justify-content-between align-items-center mb-5">
            <div class="col-lg-5 d-lg-block d-none">
                <img src="./assets/delivery-man.jpg" alt="" class="img-fluid" draggable="true">
            </div>
            <div class="col-lg-6 text-center">
                <h1 class="display-5 mb-3">How We Operate?</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos delectus
                    cupiditate optio, totam
                    quis dolorum?
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui nulla dolores animi, excepturi
                    consequatur autem harum praesentium sint velit consectetur?</p>
            </div>
        </div>
    </div>
    <div class="container mb-5" style="margin-top: 8rem">
        <h1 class="display-5 my-5 mb-2 text-center">Frequently Asked Questions?</h1>
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-9 p-5">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit Placeat?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus, necessitatibus.
                                Aliquid sed dicta ipsa et quam nam repudiandae ex. Corporis laborum voluptas in
                                itaque eos id nam perspiciatis quaerat maxime.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit Aspernatur?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam tempore praesentium
                                ullam voluptas omnis voluptatem recusandae quasi culpa, nisi, eum quidem, aliquid
                                inventore provident ad architecto officia a nostrum corrupti?
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit Laborum?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus harum modi officia
                                quae, quasi similique nobis enim pariatur. Enim quaerat numquam doloremque explicabo
                                placeat suscipit dolorum esse dolor praesentium exercitationem!
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <x-reviews />


    <x-footer />

</body>

</html>
