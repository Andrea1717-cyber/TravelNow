<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hoteles TravelNow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Barra superior empresarial -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">TravelNow</a>
        </div>
    </nav>

    <div class="container">
        <h1 class="mb-4">Listado de Hoteles</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Tabla de hoteles -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Imagen</th>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Ciudad</th>
                        <th>Precio por noche</th>
                        <th>Habitaciones disponibles</th>
                        <th>Calificación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hoteles as $hotel)
                        <tr>
                            <td><img src="{{ $hotel['imagen'] }}" alt="Hotel" class="img-fluid rounded"></td>
                            <td>{{ $hotel['id'] }}</td>
                            <td>{{ $hotel['title'] }}</td>
                            <td>{{ $hotel['body'] }}</td>
                            <td>{{ $hotel['ciudad'] }}</td>
                            <td>${{ number_format($hotel['precio'], 0, ',', '.') }}</td>
                            <td>{{ $hotel['habitaciones'] }}</td>
                            <td>{{ $hotel['calificacion'] }} ★</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Formulario POST -->
        <h3 class="mt-5">Registrar Reserva Turística</h3>
        <form method="POST" action="/reservas" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label class="form-label">Hotel</label>
                <input type="text" name="hotel" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Personas</label>
                <input type="number" name="personas" class="form-control" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Reservar</button>
            </div>
        </form>

        <!-- Tabla de reservas -->
        <h3 class="mt-5">Reservas Registradas</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Hotel</th>
                        <th>Personas</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservas as $reserva)
                        <tr>
                            <td>{{ $reserva->id }}</td>
                            <td>{{ $reserva->hotel }}</td>
                            <td>{{ $reserva->personas }}</td>
                            <td>{{ $reserva->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
