@extends('frontend.layouts.main')
@section('styles')
    <style>
        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            background-color: #fff;
            box-shadow: 0 0 3px 0 rgba(0, 0, 0, 0.3);
            width: 80%;
            margin: 0 auto;
            padding: 10px;
        }

        .gallery-item {
            flex-basis: 32.7%;
            margin-bottom: 6px;
            opacity: .85;
            cursor: pointer;
        }

        .gallery-item:hover {
            opacity: 1;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gallery-content {
            font-size: .8em;
        }

        .lightbox {
            position: fixed;
            display: none;
            background-color: rgba(0, 0, 0, 0.8);
            width: 100%;
            height: 100%;
            overflow: auto;
            top: 0;
            left: 0;
            z-index: 999;
        }

        .lightbox-content {
            position: relative;
            width: 70%;
            height: 70%;
            margin: 5% auto;
        }

        .lightbox-content img {
            border-radius: 7px;
            box-shadow: 0 0 3px 0 rgba(225, 225, 225, .25);
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .lightbox-prev,
        .lightbox-next {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 7px;
            top: 45%;
            cursor: pointer;
        }

        .lightbox-prev {
            left: 0;
        }

        .lightbox-next {
            right: 0;
        }

        .lightbox-prev:hover,
        .lightbox-next:hover {
            opacity: .8;
        }

        @media (max-width: 767px) {
            .gallery-container {
                width: 100%;
            }

            .gallery-item {
                flex-basis: 49.80%;
                margin-bottom: 3px;
            }

            .lightbox-content {
                width: 80%;
                height: 60%;
                margin: 15% auto;
            }
        }

        @media (max-width: 480px) {
            .gallery-item {
                flex-basis: 100%;
                margin-bottom: 1px;
            }

            .lightbox-content {
                width: 90%;
                margin: 20% auto;
            }
        }
    </style>
@endsection
@section('content')
    @include('frontend.partials.breadcrumb', [
        'heading' => 'المركز الإعلامي',
        'sub_heading' => ' الصور',
    ])

    <!--==================================================-->
    <div class="blogs-section blog-grid section-padding">
        <div class="container">
            <div class="gallery-container">
                @foreach ($galleries as $gallery)
                    @if ($gallery->image)
                        <div class="gallery-item" data-index="{{ $loop->index + 1 }}">
                            <img src="{{ $gallery->image->getUrl() }}">
                        </div>
                    @endif
                @endforeach
            </div>
        @endsection
        @section('scripts')
            <script
                src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js">
            </script>

            <script id="rendered-js">
                const galleryItem = document.getElementsByClassName("gallery-item");
                const lightBoxContainer = document.createElement("div");
                const lightBoxContent = document.createElement("div");
                const lightBoxImg = document.createElement("img");
                const lightBoxPrev = document.createElement("div");
                const lightBoxNext = document.createElement("div");

                lightBoxContainer.classList.add("lightbox");
                lightBoxContent.classList.add("lightbox-content");
                lightBoxPrev.classList.add("fa", "fa-angle-left", "lightbox-prev");
                lightBoxNext.classList.add("fa", "fa-angle-right", "lightbox-next");

                lightBoxContainer.appendChild(lightBoxContent);
                lightBoxContent.appendChild(lightBoxImg);
                lightBoxContent.appendChild(lightBoxPrev);
                lightBoxContent.appendChild(lightBoxNext);

                document.body.appendChild(lightBoxContainer);

                let index = 1;

                function showLightBox(n) {
                    if (n > galleryItem.length) {
                        index = 1;
                    } else if (n < 1) {
                        index = galleryItem.length;
                    }
                    let imageLocation = galleryItem[index - 1].children[0].getAttribute("src");
                    lightBoxImg.setAttribute("src", imageLocation);
                }

                function currentImage() {
                    lightBoxContainer.style.display = "block";

                    let imageIndex = parseInt(this.getAttribute("data-index"));
                    showLightBox(index = imageIndex);
                }
                for (let i = 0; i < galleryItem.length; i++) {
                    if (window.CP.shouldStopExecution(0)) break;
                    galleryItem[i].addEventListener("click", currentImage);
                }
                window.CP.exitedLoop(0);

                function slideImage(n) {
                    showLightBox(index += n);
                }

                function prevImage() {
                    slideImage(-1);
                }

                function nextImage() {
                    slideImage(1);
                }
                lightBoxPrev.addEventListener("click", prevImage);
                lightBoxNext.addEventListener("click", nextImage);

                function closeLightBox() {
                    if (this === event.target) {
                        lightBoxContainer.style.display = "none";
                    }
                }
                lightBoxContainer.addEventListener("click", closeLightBox);
                //# sourceURL=pen.js
            </script>


        </div>
    </div>

    <hr />
@endsection
