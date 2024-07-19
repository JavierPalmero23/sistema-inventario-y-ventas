<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Compras</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Compras</h1>
    <p>Desde: {{ $desde }}</p>
    <p>Hasta: {{ $hasta }}</p>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
                <tr>
                    <td>{{ $compra->id }}</td>
                    <td>{{ $compra->fecha_compra }}</td>
                    <td>{{ $compra->proveedor->nombre }}</td>
                    <td>{{ $compra->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
