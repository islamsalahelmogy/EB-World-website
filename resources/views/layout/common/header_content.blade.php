<section>
    <div class="slider-images">
        <div class="container-fuild">
            <div class="header-text slide-header-text mt-0 mb-0">
                <div class="col-xl-7 col-lg-8 col-md-8 d-block mx-auto">
                    <div class="search-background bg-transparent input-field">
                        <div class="text-center text-white mb-7">
                            <h1 class="mb-1 font-weight-semibold fs-50">إعرف أكتر عن كليتك</h1>
                        </div>
                        {{-- search in website --}}
                        <div class="search-background bg-transparent">
                            <div class="form row g-0 ">
                                <div class="form-group  col-xl-6 col-lg-6 col-md-12 mb-0 bg-white">
                                    <input type="text" class="form-control input-lg br-te-md-0 br-be-md-0" id="text4" placeholder="إبحث عن ما تريد">
                                </div>
                                <div class="form-group col-xl-3 col-lg-3 col-md-12 select2-lg  mb-0 bg-white">
                                    <select class="form-control select2 border-bottom-0 select2-hidden-accessible" data-placeholder="Select Type" tabindex="-1" aria-hidden="true">
                                        <optgroup>
                                            <option value="1">المادة</option>
                                            <option value="2">الدكتور</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-12 mb-0">
                                    <a href="javascript:void(0)" class="btn btn-lg btn-block btn-primary br-ts-md-0 br-bs-md-0">إبحث هنا</a>
                                </div>
                            </div>
                        </div>
                        {{-- categories for website --}}
                        @stack('categories')
                        @stack('breadcrumb')

                    </div>
                </div>
            </div><!-- /header-text -->
        </div>
    </div>
</section>