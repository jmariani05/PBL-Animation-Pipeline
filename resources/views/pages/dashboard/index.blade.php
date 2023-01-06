@extends('layouts.app') @section('content')

<section class="content-header">
    <div class="container-fluid">
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card p-md-5">
                    <div class="card-body">
                        <div class="mx-auto" style="max-width: 900px">
                            <div class="d-flex justify-content-center align-items-center mt-4 mb-5">
                                <img src="{{ asset('logo.png') }}"
                                    alt="Logo" width="100">
                                <h1 class="text-center h3 font-weight-bold text-muted mb-0 ml-3">Pipeline Animation</h1>
                            </div>

                            <p>NextGen Pipeline Animation adalah sebuah platform aplikasi berbasis web yang mendukung
                                Management Animation Pipeline (proses penciptaan sebuah proyek animasi dari mulai
                                pengembangan cerita sampai pada proses penyelesaian suatu film animasi). </p>
                            <p>Tujuan dibuatnya aplikasi ini adalah agar pengerjaan sebuah animasi yang dilakukan secara
                                kolaboratif dapat di-manage dengan baik oleh setiap kolaborator yang memiliki perannya
                                masing-masing.
                            </p>
                            {{--
                            <p>Produk ini akan dijalankan oleh pengguna yang memiliki koneksi internet. Penggunaan
                                sistem
                                terbagi berdasarkan fitur-fitur yang tersedia, yaitu melihat progress pengerjaan proyek
                                animasi, melakukan update pada status pengerjaan sebuah task, meng-upload video/scene
                                yang
                                telah selesai dikerjakan, dll. Produk ini dapat berjalan pada platform atau sistem
                                operasi
                                apa saja yang mendukung aplikasi berbasis web.
                            </p>

                            <p>Manfaat yang didapat apabila menggunakan sistem ini antara lain adalah:</p>

                            <ol>
                                <li>Aplikasi luaran PBL Pipeline Animation adalah sebuah aplikasi berbasis web yang
                                    menyediakan layanan untuk memudahkan pemantauan progress pembuatan/produksi animasi.
                                </li>
                                <li>Membantu product owner untuk mengatur rancangan produksi animasi yang akan dibuat
                                    dengan
                                    mendata tahap-tahap yang akan dilakukan untuk kedepannya kepada artist.</li>
                            </ol>

                            <p>Dalam aplikasi ini, pengguna yang terlibat adalah: </p>

                            <ol>
                                <li>
                                    Supervisor/Production Manager

                                    <p>Supervisor dapat melihat progress pengerjaan proyek animasi seluruh anggota tim
                                        produksi yang berkolaborasi dan tergabung dalam satu proyek animasi yang sama.
                                    </p>
                                </li>
                                <li>
                                    Artist

                                    <p>Artist (animator, concept artist, storyboard artist, sound designer, sfx artist,
                                        voice artist, dan yang lainnya) dapat melakukan penambahan task sesuai
                                        kebutuhan,
                                        melihat dan melakukan update dan delete status pada task yang sedang dikerjakan,
                                        dan
                                        melakukan upload hasil task yang telah diselesaikan. </p>
                                </li>
                            </ol> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection