@extends('layouts.mainHome')
{{-- <link rel="icon" href="{{ URL::asset('home/img/home.png') }}" > --}}
@section('title','Pasar Jasa Krandegan')




@section('container')


{{-- About section Start --}}
<section class="about section-padding" id="about">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <h2>Mudahnya menggunakan Pasar Jasa</h2>
                </div>
            </div>  
        </div>
        <?php $a= 3; ?>
        @forelse ($information as $info)
         <?php if($a%2 != 0){ ?>
        <div class="row align-items-center ml-5 " data-aos="fade-right" data-aos-duration="1000">
            <div class="col-md-7 go align-items-center justify-content-center " >
                <div class="box">
                    <h2>{{ $info->name }}</h2>
                    <p>{!!$info->body !!}</p>
                </div>
            </div>
            <div class="col-md-5 d-none d-md-block align-items-center justify-content-center">
                <img src="{{ asset('uploads/information/' . $info->image) }}"
                class="rounded" style="width: 100%">
            </div>
        </div>
      <?php }else{ ?> 

        <div class="row align-items-center " data-aos="fade-left" data-aos-duration="2000">
            <div class="col-md-5 d-none d-md-block">
                <img src="{{ asset('uploads/information/' . $info->image) }}"
                class="rounded" style="width: 100%">
            </div>

            <div class="col-md-7 go">
                <div class="box">
                    <h2>{{ $info->name }}</h2>
                    <p>{!! $info->body !!}</p>
                </div>
            </div>
        </div>
        <?php }
        $a++;
        ?>
    @endforeach
    </div>
</section>
<!-- feature section end -->


<!-- feature section start -->
<section class="feature section-padding" data-scroll-index="4" id="feature">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <h2>PasarJasa untuk kebutuhan setiap hari</h2>
                </div>
            </div>  
        </div>
        <div class="row">
            @foreach($category as $c )
            <div class="container-content  col-lg-3 content"  data-aos="fade-up" data-aos-duration="1000">
            
              <div class="content-item">
                <div class="img-box">
                    <img src="{{ asset('uploads/categories/' . $c->image) }}" alt="testimonials-1">
                  </div>
                  {{-- <h5>{{ $c->name }}</h5> --}}
                  <a href="{{  route('category.show', $c->slug) }}">{{ $c->name }} </a>
              </div>
          </div>
              @endforeach 
        </div>
    </div>
</section>
<!-- feature section end -->

<!-- download app section start -->
<section class="app-download section-padding"data-scroll-index="3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <h2>Unduh aplikasi sekarang juga </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="app-download-item">
                    <i class="fab fa-google-play"></i>
                    <h3>Google play</h3>
                    
                    <a href="#" class="btn-buy"> Download now</a>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="app-download-item">
                    <i class="fab fa-apple"></i>
                    <h3>Apple Store</h3>
                    <a href="#" class=" btn-buy"> Download now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- download app section end -->

<!-- faq section start -->
<section class="faq section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title">
                    <h2>Mengapa Pasarjasa.id ?</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div id="accordion">
                    <div class="accordion-item">
                        <div class="accordion-header" data-toggle="collapse" data-target="#collapse-01">
                            <h3>Teknisi terlatih siap melayani anda kapanpun</h3>
                        </div>
                        <div class="collapse show" id="collapse-01" data-parent="#accordion"> 
                            <div class="accordion-body">
                                <p>Berdasarkan pesanan anda, kami dapat mencocokan Anda dengan teknis terlatih dan berkualitas.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-02">
                            <h3>Harga tetap dengan garansi untuk semua perbaikan</h3>
                        </div>
                        <div class="collapse" id="collapse-02" data-parent="#accordion">
                            <div class="accordion-body">
                               <p>Semua servis kami mempunyai harga yang tetap disertakan dengan garansi.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <div class="accordion-header collapsed" data-toggle="collapse" data-target="#collapse-03">
                            <h3>Menerima uang tunai atau transfer dengan aman</h3>
                        </div>
                        <div class="collapse" id="collapse-03" data-parent="#accordion">
                            <div class="accordion-body">
                                <p>PasarJasa menerima pembayaran tunai dan transfer. Nikmati pelayanan pembayaran yang aman, terjamin, dan real-time.</p>
                                </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- faq section end -->
