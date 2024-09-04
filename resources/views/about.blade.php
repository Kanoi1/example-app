@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <section id="home">
        <div class="hero">
            <div class="hero-content">
                <h2>Bienvenidos a Eben Ezer</h2>
                <p>Descubre nuestra nueva colección</p>
                <a href="#shop" class="btn">Comprar Ahora</a>
            </div>
        </div>
    </section>

    <section id="about" class="section">
        <div class="container">
            <h2>Sobre Nosotros</h2>
            <p>En Eben Ezer, nos dedicamos a ofrecer ropa de alta calidad con un diseño exclusivo y elegante. Nuestra misión es proporcionar una experiencia de compra única y satisfactoria.</p>
    </section>

    <section id="shop" class="section">
        <div class="container">
            <h2>Nuestra Tienda</h2>
            <div class="products">
                <div class="product">
                    <img src="{{ asset('img/product1.jpg') }}" alt="Producto 1">
                    <h3>Producto 1</h3>
                    <p>$100.00</p>
                </div>
                <div class="product">
                    <img src="{{ asset('img/product2.jpg') }}" alt="Producto 2">
                    <h3>Producto 2</h3>
                    <p>$150.00</p>
                </div>
                <!-- Más productos aquí -->
            </div>
        </div>
    </section>

    <section id="contact" class="section">
        <div class="container">
            <h2>Contacto</h2>
            <p>Puedes contactarnos a través de nuestras redes sociales o enviándonos un correo a info@EbenEzer.com.</p>
        </div>
    </section>
@endsection