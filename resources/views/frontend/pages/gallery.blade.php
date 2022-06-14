@extends('frontend.master')
@section('title')
Gallery
@endsection
@push('style')
<link href="{{ asset('css/simpleLightbox.css') }}" rel="stylesheet">
<style>
    /* .row {
            width: 100%;
            max-width: 1170px;
            margin: 0 auto;
            padding: 0;
            clear: both;
        } */

    #gallery .row img {
        max-width: 100%;
        height: auto;
        padding: 0;
        margin: 0;
    }

    .gallery ul li {
        float: left;
        margin: 0 0.8771929825%;
        overflow: hidden;
    }

    #galleryhead {
        background-color: #ffb600;
        color: #fff;
        text-align: center;
        padding: 30px 0 120px;
    }

    #galleryhead h1 {
        text-align: center;
        text-transform: uppercase;
        font-size: 65px;
        font-weight: 400;
        letter-spacing: 3px;
        line-height: 1.2;
        padding-top: 50px;
        font-family: "Montserrat", sans-serif;
    }

    #galleryhead h1 span {
        text-transform: uppercase;
        letter-spacing: 7px;
        font-size: 25px;
        line-height: 1;
    }

    #gallery p {
        padding-top: 30px;
    }

    .gallery .images {
        /* padding: 40px 0 300px; */
        position: relative;
        overflow: hidden;
    }


    .gallery .images {
        margin-bottom: 20px;
        width: 23.2456140351%;
        position: relative;
    }

    .gallery a {
        display: block;
        position: relative;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        line-height: 0;
    }

    .gallery a:before {
        position: absolute;
        width: 50px;
        height: 50px;
        top: 50%;
        left: 50%;
        margin: -14px -10px 0 -16px;
        background: url(data:image/svg+xml;utf8,%3C%3Fxml%20version%3D%221.0%22%20encoding%3D%22utf-8%22%3F%3E%0A%3C%21--%20Generator%3A%20Adobe%20Illustrator%2017.1.0%2C%20SVG%20Export%20Plug-In%20.%20SVG%20Version%3A%206.00%20Build%200%29%20%20--%3E%0A%3C%21DOCTYPE%20svg%20PUBLIC%20%22-//W3C//DTD%20SVG%201.1//EN%22%20%22http%3A//www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd%22%3E%0A%3Csvg%20version%3D%221.1%22%0A%09%20id%3D%22svg2%22%20xmlns%3Adc%3D%22http%3A//purl.org/dc/elements/1.1/%22%20xmlns%3Acc%3D%22http%3A//creativecommons.org/ns%23%22%20xmlns%3Ardf%3D%22http%3A//www.w3.org/1999/02/22-rdf-syntax-ns%23%22%20xmlns%3Asvg%3D%22http%3A//www.w3.org/2000/svg%22%20xmlns%3Asodipodi%3D%22http%3A//sodipodi.sourceforge.net/DTD/sodipodi-0.dtd%22%20xmlns%3Ainkscape%3D%22http%3A//www.inkscape.org/namespaces/inkscape%22%20inkscape%3Aversion%3D%220.48.4%20r9939%22%20sodipodi%3Adocname%3D%22icon-fullscreen.svg%22%0A%09%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20xmlns%3Axlink%3D%22http%3A//www.w3.org/1999/xlink%22%20x%3D%220px%22%20y%3D%220px%22%20viewBox%3D%220%200%20960%20560%22%0A%09%20enable-background%3D%22new%200%200%20960%20560%22%20xml%3Aspace%3D%22preserve%22%3E%0A%3Csodipodi%3Anamedview%20%20borderopacity%3D%221%22%20pagecolor%3D%22%23ffffff%22%20bordercolor%3D%22%23666666%22%20objecttolerance%3D%2210%22%20gridtolerance%3D%2210%22%20guidetolerance%3D%2210%22%20showgrid%3D%22false%22%20fit-margin-top%3D%220%22%20fit-margin-left%3D%220%22%20inkscape%3Azoom%3D%227.375%22%20inkscape%3Acx%3D%22-5.1525424%22%20inkscape%3Acy%3D%2216%22%20id%3D%22namedview11%22%20inkscape%3Awindow-x%3D%22-8%22%20inkscape%3Awindow-y%3D%22-8%22%20fit-margin-right%3D%220%22%20inkscape%3Apageopacity%3D%220%22%20fit-margin-bottom%3D%220%22%20inkscape%3Awindow-width%3D%221366%22%20inkscape%3Awindow-height%3D%22706%22%20inkscape%3Awindow-maximized%3D%221%22%20inkscape%3Apageshadow%3D%222%22%20inkscape%3Acurrent-layer%3D%22svg2%22%3E%0A%09%3C/sodipodi%3Anamedview%3E%0A%3Cg%3E%0A%09%3Crect%20x%3D%22220%22%20y%3D%22260%22%20fill%3D%22%23FFFFFF%22%20width%3D%22536%22%20height%3D%2224%22/%3E%0A%3C/g%3E%0A%3Cg%3E%0A%09%3Crect%20x%3D%22476%22%20y%3D%224%22%20fill%3D%22%23FFFFFF%22%20width%3D%2224%22%20height%3D%22556%22/%3E%0A%3C/g%3E%0A%3C/svg%3E%0A) no-repeat;
        content: "";
        opacity: 0;
        z-index: 1;
        -webkit-transition: all 0.3s linear;
        -moz-transition: all 0.3s linear;
        transition: all 0.3s linear;
    }

    .gallery a:hover:before {
        top: 50%;
        opacity: 1;
    }

    .gallery a:after {
        position: absolute;
        width: 100%;
        right: 0;
        top: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.342);
        content: "";
        opacity: 0;
        -webkit-transition: all 0.3s linear;
        -moz-transition: all 0.3s linear;
        transition: all 0.3s linear;
    }

    .gallery a:hover:after {
        opacity: 1;
    }

</style>
@endpush
@section('content')
<header id="galleryhead">
    <h1>SQG SUCCESS <br> <span>[ Gallery ]</span></h1>
</header>
<div id="top"></div>
<section id="gallery" class="gallery">
    <div class="container">
        <div class="row">
            @forelse ($images as $image)
            <div class="col-lg-4 col-md-3 col-sm-6 col-12 images">
                @if ($image->type == 1)
                <a title="{{ $image->title }}" href="{{ $image->image_link }}">
                    <video src="{{ $image->image_link }}"></video>
                </a>
                @else
                <a title="{{ $image->title }}" href="{{ $image->image_link }}">
                    <img src="{{ $image->image_link }}" alt="">
                </a>
                @endif
            </div>
            @empty
            <div class="col-lg-4 col-md-3 col-sm-6 col-12 images">
                <a title="image 1" href="https://cdn.dribbble.com/users/545884/screenshots/3981307/lorena2.png">
                    <img src="https://cdn.dribbble.com/users/545884/screenshots/3981307/lorena2.png" alt="">
                </a>
            </div>
            @endforelse
        </div> <!-- / row -->
    </div>
</section>
@endsection
@push('script')
<script src="{{ asset('js/simpleLightbox.js') }}"></script>
<script>
    $(document).ready(function() {
            $('#gallery a').simpleLightbox({});
        })
</script>
@endpush