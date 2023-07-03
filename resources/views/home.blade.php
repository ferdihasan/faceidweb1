@extends('layouts.main')
@section('head')
    <style>
        .alert-centered {
            position: absolute;
            left: 50%;
            y-index: +1;
            transform: translate(-50%, -50%);
        }
    </style>
@endsection
@section('alert')
    @if (session()->has('logout'))
        <div class="alert alert-success alert-dismissible fade show alert-centered" role="alert">
            <i class="bi bi-check-circle-fill"> </i>{{ session('logout') }}
            <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('email'))
        <div class="alert alert-danger alert-dismissible fade show alert-centered" role="alert">
            <i class="bi bi-x-circle-fill"> </i>{{ session('email') }}
            <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="Close"></button>
        </div>
    @endif
@endsection
@section('container')
    <div class="d-flex row mt-5">
        <div class="col">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner rounded-5">
                    <div class="carousel-item active">
                        <img src="img/img1.jpeg" class="d-block w-100" alt="img/img1">
                    </div>
                    <div class="carousel-item">
                        <img src="img/img2.jpeg" class="d-block w-100" alt="img/img2">
                    </div>
                    <div class="carousel-item">
                        <img src="img/img3.jpeg" class="d-block w-100" alt="img/img3">
                    </div>
                    <div class="carousel-item">
                        <img src="img/img4.jpeg" class="d-block w-100" alt="img/img4">
                    </div>
                    <div class="carousel-item">
                        <img src="img/img5.jpeg" class="d-block w-100" alt="img/img5">
                    </div>
                    <div class="carousel-item">
                        <img src="img/img6.jpeg" class="d-block w-100" alt="img/img6">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col p-4 ">
            <div class="d-flex justify-content-center">
                <h3>About Us</h3>
            </div>
            <div class="row">
                <table>
                    <tr>
                        <th>Alamat Lengkap:</th>
                        <td style="text-align: justify">Jl. Bulang No.18, Bulang, Kec. Prambon, Kabupaten Sidoarjo, Jawa Timur 61264</td>
                    </tr>
                    <tr>
                        <th>About:</th>
                        <td style="text-align: justify">Industri Kertas Jaya adalah industri yang bergerak di bidang pengolahan barang bekas sejak 1995 hingga sekarang.  Produk utama yang digunakan adalah kertas bekas dan kardus bekas yang akan di olah secara bertahap untuk dijadikan kertas baru yang akan dijual sebagai bahan dasar buku di industri besar percetakan Indonesia.</td>
                    </tr>
                    <tr>
                        <th>Visi:</th>
                        <td style="text-align: justify">menjadi sebuah industri yang memiliki daya saing tinggi dan menciptakan keharmonisan di segala aspek</td>
                    </tr>
                    <tr>
                        <th>Misi:</th>
                        <td style="text-align: justify">Tahan menghadapi pasar global dengan meningkatkan daya saing secara profesional dalam bidang : kualitas produk, pelayanan pelanggan, efisiensi, Intensif dan gigih bertahan dalam segala situasi untuk mencapai pertumbuhan yang berkelanjutan dan berkesinambungan. Memelihara keharmonisan universal dengan semua pemangku kepentingan.</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <footer class="shadow-lg" style="position:absolute; bottom: 0; width: 100%; height: 170px">
        <div class="container">
            <div class="row mb-3">
                <div class="col-3">
                    <div style="height: 100%; text-align: center; margin: auto">
                        <br><br>
                        <h2>Kertas Jaya</h2>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center">
                        <h3>Contact</h3>
                    </div>
                    <div class="d-flex row">
                        <div class="col">
                            <table>
                                <tr>
                                    <th><i class="bi bi-envelope"></i> Email: </th>
                                    <td>support@kertasjaya.com</td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-telephone"></i> Nomor: </th>
                                    <td>029212345</td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-facebook"></i> Facebook: </th>
                                    <td>https://www.facebook.com/kertasjaya</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col">
                            <table>
                                <tr>
                                    <th><i class="bi bi-twitter"></i> Twitter: </th>
                                    <td>https://www.twitter.com/kertasjaya</td>
                                </tr>
                                <tr>
                                    <th><i class="bi bi-instagram"></i> instagram: </th>
                                    <td>https://www.instagram.com/kertasjaya</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <hr>
                <p>Powered By &copy; Kertas Jaya Industry</p>
            </div>
        </div>
    </footer>
@endsection
