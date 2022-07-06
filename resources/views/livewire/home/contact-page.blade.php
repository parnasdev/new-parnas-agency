<div>
    <section class="s-contact-us">
        <div class="bg-dark-opacity"></div>
        <div class="prs-responsive">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-11 m-auto-x d-flex justify-content-center">
                        <div class="box-contact-us">
                            @livewire('form-builder' , ['name' => $post->options['form_code'] ?? '0'])
                            <div class="map-parent">
                                <div class="w-100 d-flex flex-column align-items-start">
                                    {!! $post->options['contact_info'] ?? null !!}
                                </div>
                                <div class="bottom">
                                    {!! $post->options['map_frame'] ?? null !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
