<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Ventas</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Reporte de Ventas</h1>
    <p>Desde: {{ $desde }}</p>
    <p>Hasta: {{ $hasta }}</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->fecha_venta }}</td>
                    <td>{{ $venta->cliente->nombre }}</td>
                    <td>{{ $venta->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
