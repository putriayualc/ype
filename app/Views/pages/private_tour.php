<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>

<!-- ========== header end============= -->
<div class="inner-banner-section" style="background-image: url(<?= base_url('assets/images/Santorini-tour.jpg') ?>);">
<img src="<?= base_url('assets/images/contact_us.jpg') ?>" alt="A Female standing on the bridge" style="display: none;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-md-10 col-sm-12">
                <div class="breadcrumb-area">
                    <h2>
                        <?= $language == 'id' ? $service['head_title'] : $service['head_title'] ?>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-wrapper sec-mar">
    <article aria-label="article" id="post-28" class="post-28 page type-page status-publish hentry">
        <div class="inner-post">
            <div data-elementor-type="wp-page" data-elementor-id="28" class="elementor elementor-28">
                <section class="elementor-section elementor-top-section elementor-element elementor-element-aa8649e elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="aa8649e" data-element_type="section" style="margin-top: 60px !important;">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7c7b2d8" data-id="7c7b2d8" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-ef6b795 elementor-widget elementor-widget-astrip_heading" data-id="ef6b795" data-element_type="widget" data-widget_type="astrip_heading.default">
                                    <div class="elementor-widget-container">


                                        <div class=" justify-content-center">
                                            <div class="section-title1">
                                                <p style="color:black !important;margin-top: 20px !important;font-family: 'Open Sans' !important; font-weight: 700; font-size: 30px; line-height: 1.4;">
                                                    <?= $language == 'id' ? $service['title_id'] : $service['title_en'] ?>
                                                </p>
                                                <div class="heading-ribbon flex justify-center">
                                                    <svg width="370" height="18" viewBox="0 0 370 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M184.946 0.780971C183.9 1.11998 183.054 1.98633 182.734 3.03348L182.601 3.46289L182 3.48549L181.391 3.50809L181.02 3.16908C180.508 2.70201 179.944 2.33287 179.15 1.95619C176.648 0.750837 173.62 0.999442 171.305 2.59654C170.629 3.05608 169.746 3.94503 169.308 4.59291C167.074 7.86998 167.408 12.1716 170.117 14.9515C171.668 16.5485 173.613 17.3622 175.847 17.3622C178.823 17.3622 181.599 15.6219 182.905 12.94L183.209 12.3223L183.914 12.1867C184.909 11.9983 187.091 11.9983 188.086 12.1867L188.791 12.3223L189.073 12.9023C190.401 15.637 193.14 17.3622 196.153 17.3622C199.894 17.3622 203.004 14.9063 203.924 11.2299C204.584 8.57813 203.85 5.73047 201.979 3.71903C201.296 2.98828 200.643 2.50614 199.693 2.03153C198.758 1.56445 198.053 1.36105 196.97 1.24051C194.81 0.999442 192.427 1.79046 190.891 3.25195C190.631 3.50809 190.616 3.50809 190.008 3.48549L189.399 3.46289L189.266 3.03348C188.939 1.95619 188.048 1.07478 186.972 0.758371C186.43 0.600167 185.48 0.607701 184.946 0.780971ZM186.868 2.0692C187.581 2.3856 188.108 3.11635 188.197 3.9149C188.227 4.14844 188.308 4.41964 188.39 4.51758C188.516 4.68331 188.59 4.70592 189.05 4.70592C189.332 4.70592 189.563 4.72098 189.563 4.73605C189.563 4.75865 189.444 4.97712 189.295 5.23326C188.939 5.85854 188.642 6.59682 188.442 7.39537C188.308 7.92271 188.271 8.26925 188.271 9.113C188.264 9.69308 188.293 10.3485 188.323 10.5745L188.382 10.9813L188.138 10.9286C188.004 10.8984 187.47 10.8457 186.95 10.8005C186.045 10.7176 184.575 10.7854 183.855 10.9286C183.61 10.9813 183.603 10.9813 183.655 10.7628C183.759 10.2732 183.788 8.85686 183.707 8.20898C183.595 7.3577 183.195 6.12974 182.786 5.39146C182.616 5.07506 182.467 4.79632 182.452 4.76618C182.437 4.72852 182.66 4.70592 182.942 4.70592C183.41 4.70592 183.484 4.68331 183.61 4.51758C183.692 4.41964 183.773 4.14844 183.803 3.9149C183.981 2.3856 185.51 1.45898 186.868 2.0692ZM177.532 2.67188C180.76 3.60603 182.831 6.65709 182.504 9.96429C182.148 13.4674 179.268 16.1116 175.795 16.1116C173.925 16.1116 172.359 15.4336 171.008 14.055C169.746 12.7667 169.078 11.1169 169.078 9.30887C169.078 7.48577 169.709 5.89621 170.948 4.58538C171.928 3.54576 173.079 2.88281 174.407 2.58901C175.268 2.40067 176.73 2.43834 177.532 2.67188ZM197.541 2.58901C198.907 2.87528 200.042 3.51563 201.037 4.57031C204.273 7.99051 203.211 13.5276 198.944 15.524C197.675 16.1191 196.02 16.2849 194.654 15.9459C192.746 15.4637 191.166 14.2132 190.238 12.4503C188.709 9.54241 189.511 5.85854 192.108 3.8697C193.014 3.17662 194.075 2.70201 195.07 2.52874C195.76 2.41574 196.829 2.43834 197.541 2.58901Z" fill="#086B7D"></path>
                                                        <path d="M185.295 2.81501C184.523 3.28962 184.323 4.17857 184.805 4.94699C185.072 5.36886 185.458 5.57227 186 5.57227C186.542 5.57227 186.928 5.36886 187.195 4.94699C187.447 4.54018 187.521 4.1409 187.41 3.7341C187.321 3.38756 186.972 2.94308 186.661 2.77734C186.356 2.61914 185.57 2.64174 185.295 2.81501Z" fill="#086B7D"></path>
                                                        <path d="M174.637 3.60603C172.477 4.06557 170.815 5.7154 170.258 7.94531C170.028 8.85686 170.08 10.1978 170.377 11.0943C171.008 12.9927 172.566 14.4542 174.474 14.9289C175.209 15.1097 176.515 15.0871 177.264 14.8836C179.268 14.3412 180.864 12.6839 181.354 10.6348C181.517 9.97935 181.525 8.66853 181.369 7.99805C180.901 5.94894 179.439 4.36691 177.428 3.72656C176.76 3.51562 175.357 3.45536 174.637 3.60603ZM176.886 4.90178C177.665 5.09012 178.266 5.45173 178.912 6.09961C179.595 6.78516 179.921 7.34263 180.137 8.21652C180.745 10.6272 179.246 13.0907 176.797 13.716C176.144 13.8817 175.008 13.829 174.355 13.5954C173.746 13.377 172.878 12.7818 172.455 12.2921C171.72 11.4408 171.349 10.4163 171.349 9.26367C171.349 8.62333 171.379 8.41992 171.572 7.86998C171.846 7.07143 172.225 6.48382 172.804 5.95647C173.242 5.54966 173.984 5.10519 174.511 4.93945C175.194 4.71345 176.077 4.69838 176.886 4.90178Z" fill="#086B7D"></path>
                                                        <path d="M175.216 5.84347C173.902 6.04688 172.752 7.16183 172.448 8.52539C172.247 9.43694 172.425 9.90402 172.967 9.90402C173.368 9.89648 173.605 9.59514 173.605 9.09793C173.605 8.93973 173.702 8.60826 173.813 8.35965C174.147 7.65151 174.8 7.1543 175.513 7.07143C176.018 7.01116 176.248 6.90569 176.344 6.69475C176.463 6.41602 176.448 6.24275 176.263 6.03181C176.062 5.79827 175.795 5.75307 175.216 5.84347Z" fill="#086B7D"></path>
                                                        <path d="M195.188 3.57589C193.355 3.8923 191.626 5.30106 190.921 7.05636C190.505 8.09598 190.386 9.58761 190.646 10.6348C191.136 12.6839 192.732 14.3412 194.736 14.8836C195.485 15.0871 196.791 15.1097 197.526 14.9289C199.434 14.4542 201 12.9927 201.623 11.0943C201.786 10.5896 201.838 10.2882 201.861 9.56501C201.935 7.76451 201.43 6.43108 200.213 5.19559C199.345 4.31417 198.461 3.83203 197.311 3.60603C196.71 3.49302 195.76 3.47796 195.188 3.57589ZM197.311 4.90179C198.031 5.08259 198.743 5.50446 199.359 6.13728C200.243 7.03376 200.658 8.05078 200.651 9.30134C200.643 10.8457 199.931 12.1867 198.662 13.053C197.912 13.5653 197.341 13.7536 196.428 13.7988C195.879 13.829 195.559 13.8064 195.203 13.716C193.511 13.2866 192.175 11.9079 191.826 10.2355C191.373 8.05831 192.546 5.88867 194.624 5.05246C195.455 4.72098 196.361 4.66825 197.311 4.90179Z" fill="#086B7D"></path>
                                                        <path d="M195.611 5.84347C194.068 6.07701 192.754 7.62891 192.754 9.21094C192.754 9.81362 193.325 10.115 193.748 9.73075C193.897 9.60268 193.956 9.45201 194.008 9.05273C194.09 8.44252 194.327 7.99805 194.788 7.59124C195.136 7.27483 195.715 7.04129 196.138 7.04129C196.91 7.04129 197.044 5.91881 196.279 5.8058C196.153 5.79074 195.856 5.8058 195.611 5.84347Z" fill="#086B7D"></path>
                                                        <rect x="215" y="8" width="155" height="2" rx="1" fill="url(#paint0_linear_2_2)"></rect>
                                                        <rect y="8" width="157" height="2" rx="1" fill="url(#paint1_linear_2_2)"></rect>
                                                        <defs>
                                                            <linearGradient id="paint0_linear_2_2" x1="215" y1="8.99999" x2="370" y2="8.99998" gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="#086B7D"></stop>
                                                                <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                                            </linearGradient>
                                                            <linearGradient id="paint1_linear_2_2" x1="-2.0562e-07" y1="8.99999" x2="157" y2="8.99998" gradientUnits="userSpaceOnUse">
                                                                <stop stop-color="white"></stop>
                                                                <stop offset="1" stop-color="#086B7D"></stop>
                                                            </linearGradient>
                                                        </defs>
                                                    </svg>
                                                </div>
                                                <p style="margin-top: 20px;text-align:center;font-family:'Open Sans';font-size: 18px; line-height: 24px;font-weight: 500;text-transform:none">
                                                    <?= $language == 'id' ? $service['desc_id'] : $service['desc_en'] ?>
                                                </p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="elementor-section elementor-top-section elementor-element elementor-element-161463a elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="161463a" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-33b0937" data-id="33b0937" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-7d8f3f0 elementor-widget elementor-widget-astrip_image_gallery" data-id="7d8f3f0" data-element_type="widget" data-widget_type="astrip_image_gallery.default">
                                    <div class="elementor-widget-container">
                                        <div class="destination-section">
                                            <div class="container text-center">
                                                <!-- <div class="nav d-inline-flex flex-row justify-content-center nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                    <button style="font-family: 'Oswald';" class="nav-link active nav-btn-style  mb-20" id="v-pills-information-tab" data-bs-toggle="pill" data-bs-target="#v-pills-information" type="button" role="tab" aria-controls="v-pills-information" aria-selected="true">VIP SERVICES</button>
                                                </div> -->

                                                <div class="tab-content mt-40" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="v-pills-information" role="tabpanel" aria-labelledby="v-pills-information-tab">
                                                        <div class="row justify-content-center">
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <div class="image-gallery-single position-relative">
                                                                    <div class="image-view">
                                                                        <a href="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/gallery-img1-1.png" class="video-icon image-open"><i class="bi bi-binoculars"></i></a>
                                                                    </div>
                                                                    <img loading="lazy" decoding="async" src="<?= base_url('assets/images/services/275.jpg') ?>" class="img-fluid" alt="image">
                                                                </div>
                                                                <div class="image-gallery-single position-relative">
                                                                    <div class="image-view">
                                                                        <a href="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/gallery-img4-1" class="video-icon image-open"><i class="bi bi-binoculars"></i></a>
                                                                    </div>
                                                                    <img loading="lazy" decoding="async" src="<?= base_url('assets/images/services/2351.jpg') ?>" class="img-fluid" alt="image">
                                                                </div>
                                                                <div class="image-gallery-single position-relative">
                                                                    <div class="image-view">
                                                                        <a href="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/gallery-img7-1.png" class="video-icon image-open"><i class="bi bi-binoculars"></i></a>
                                                                    </div>
                                                                    <img loading="lazy" decoding="async" src="<?= base_url('assets/images/services/3443.jpg') ?>" class="img-fluid" alt="image">
                                                                </div>
                                                                <div class="image-gallery-single position-relative">
                                                                    <div class="image-view">
                                                                        <a href="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/gallery-img10.png" class="video-icon image-open"><i class="bi bi-binoculars"></i></a>
                                                                    </div>
                                                                    <img loading="lazy" decoding="async" src="<?= base_url('assets/images/services/6888.jpg') ?>" class="img-fluid" alt="image">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <div class="image-gallery-single position-relative">
                                                                    <div class="image-view">
                                                                        <a href="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/gallery-img2-1.png" class="video-icon image-open"><i class="bi bi-binoculars"></i></a>
                                                                    </div>
                                                                    <img loading="lazy" decoding="async" src="<?= base_url('assets/images/services/9404.jpg') ?>" class="img-fluid" alt="image">
                                                                </div>
                                                                <div class="image-gallery-single position-relative">
                                                                    <div class="image-view">
                                                                        <a href="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/gallery-img5-1.png" class="video-icon image-open"><i class="bi bi-binoculars"></i></a>
                                                                    </div>
                                                                    <img loading="lazy" decoding="async" src="<?= base_url('assets/images/services/9528.jpg') ?>" class="img-fluid" alt="image">
                                                                </div>
                                                                <div class="image-gallery-single position-relative">
                                                                    <div class="image-view">
                                                                        <a href="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/gallery-img8-1.png" class="video-icon image-open"><i class="bi bi-binoculars"></i></a>
                                                                    </div>
                                                                    <img loading="lazy" decoding="async" src="<?= base_url('assets/images/services/10977.jpg') ?>" class="img-fluid" alt="image">
                                                                </div>
                                                                <div class="image-gallery-single position-relative">
                                                                    <div class="image-view">
                                                                        <a href="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/gallery-img11.png" class="video-icon image-open"><i class="bi bi-binoculars"></i></a>
                                                                    </div>
                                                                    <img loading="lazy" decoding="async" src="<?= base_url('assets/images/services/39924.jpg') ?>" class="img-fluid" alt="image">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                                <div class="image-gallery-single position-relative">
                                                                    <div class="image-view">
                                                                        <a href="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/gallery-img3.png" class="video-icon image-open"><i class="bi bi-binoculars"></i></a>
                                                                    </div>
                                                                    <img loading="lazy" decoding="async" src="<?= base_url('assets/images/services/48935.jpg') ?>" class="img-fluid" alt="image">
                                                                </div>
                                                                <div class="image-gallery-single position-relative">
                                                                    <div class="image-view">
                                                                        <a href="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/gallery-img6.png" class="video-icon image-open"><i class="bi bi-binoculars"></i></a>
                                                                    </div>
                                                                    <img loading="lazy" decoding="async" src="<?= base_url('assets/images/services/sailing-with-yacht-mediterranean.jpg') ?>" class="img-fluid" alt="image">
                                                                </div>
                                                                <div class="image-gallery-single position-relative">
                                                                    <div class="image-view">
                                                                        <a href="https://astrip-wp.b-cdn.net/wp-content/uploads/2022/10/gallery-img9.png" class="video-icon image-open"><i class="bi bi-binoculars"></i></a>
                                                                    </div>
                                                                    <img loading="lazy" decoding="async" src="<?= base_url('assets/images/services/Winter-sleigh.jpg') ?>" class="img-fluid" alt="image">
                                                                </div>
                                                                <div class="image-gallery-single position-relative">
                                                                    <div class="image-view">
                                                                        <a href="https://astrip-wp.b-cdn.net/wp-content/uploads/2023/01/gallery-img12.png" class="video-icon image-open"><i class="bi bi-binoculars"></i></a>
                                                                    </div>
                                                                    <img loading="lazy" decoding="async" src="<?= base_url('assets/images/services/Yacht-tour-mediterranean.jpg') ?>" class="img-fluid" alt="image">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="elementor-section elementor-top-section elementor-element elementor-element-1bd1a98 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1bd1a98" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-cec375b" data-id="cec375b" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-b4c5dd4 elementor-widget elementor-widget-image-carousel" data-id="b4c5dd4" data-element_type="widget" data-settings="{" slides_to_show":"6","navigation":"none","autoplay":"no","slides_to_show_tablet":"4","slides_to_show_mobile":"2","infinite":"yes","speed":500}"="" data-widget_type="image-carousel.default">
                                    <div class="elementor-widget-container mt-5">
                                        <style>
                                            /*! elementor - v3.17.0 - 08-11-2023 */
                                            .elementor-widget-image-carousel .swiper,
                                            .elementor-widget-image-carousel .swiper-container {
                                                position: static
                                            }

                                            .elementor-widget-image-carousel .swiper-container .swiper-slide figure,
                                            .elementor-widget-image-carousel .swiper .swiper-slide figure {
                                                line-height: inherit
                                            }

                                            .elementor-widget-image-carousel .swiper-slide {
                                                text-align: center
                                            }

                                            .elementor-image-carousel-wrapper:not(.swiper-container-initialized):not(.swiper-initialized) .swiper-slide {
                                                max-width: calc(100% / var(--e-image-carousel-slides-to-show, 3))
                                            }
                                        </style>
                                        <div class="elementor-image-carousel-wrapper swiper-container" dir="ltr">
                                            <div class="elementor-image-carousel swiper-wrapper" aria-live="polite">
                                                <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="1 of 6">
                                                    <figure class="swiper-slide-inner"><img loading="lazy" decoding="async" class="swiper-slide-image" src="<?= base_url('assets/images/services/partner6.svg') ?>" alt="partner6"></figure>
                                                </div>
                                                <div class="swiper-slide    " role="group" aria-roledescription="slide" aria-label="2 of 6">
                                                    <figure class="swiper-slide-inner"><img loading="lazy" decoding="async" class="swiper-slide-image" src="<?= base_url('assets/images/services/partner5.svg') ?>" alt="partner5"></figure>
                                                </div>
                                                <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="3 of 6">
                                                    <figure class="swiper-slide-inner"><img loading="lazy" decoding="async" class="swiper-slide-image" src="<?= base_url('assets/images/services/partner4.svg') ?>" alt="partner4"></figure>
                                                </div>
                                                <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="4 of 6">
                                                    <figure class="swiper-slide-inner"><img loading="lazy" decoding="async" class="swiper-slide-image" src="<?= base_url('assets/images/services/partner3.svg') ?>" alt="partner3"></figure>
                                                </div>
                                                <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="5 of 6">
                                                    <figure class="swiper-slide-inner"><img loading="lazy" decoding="async" class="swiper-slide-image" src="<?= base_url('assets/images/services/partner2.svg') ?>" alt="partner2"></figure>
                                                </div>
                                                <div class="swiper-slide" role="group" aria-roledescription="slide" aria-label="6 of 6">
                                                    <figure class="swiper-slide-inner"><img loading="lazy" decoding="async" class="swiper-slide-image" src="<?= base_url('assets/images/services/partner1.svg') ?>" alt="partner1"></figure>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="elementor-section elementor-top-section elementor-element elementor-element-866159c elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="866159c" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-no">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-8a3e527" data-id="8a3e527" data-element_type="column">
                            <div class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-8df599d elementor-widget elementor-widget-egens_instagram_feed" data-id="8df599d" data-element_type="widget" data-widget_type="egens_instagram_feed.default">
                                    <div class="elementor-widget-container">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </article>
</div>

<?= $this->endSection() ?>