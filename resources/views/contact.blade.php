@extends('layouts.app')

@section('title', 'Contacto')

@section('content')
    <section id="contact" class="section">
        <div class="container">
            <h2>Contacto</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo:</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="subscribe">Desea recibir publicidad:</label>
                    <input type="checkbox" name="subscribe" id="subscribe" {{ old('subscribe') ? 'checked' : '' }}>
                </div>

                <div class="form-group">
                    <label for="message">Mensaje:</label>
                    <textarea name="message" id="message" rows="5" required>{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn">Enviar</button>
            </form>
        </div>
    </section>
@endsection
