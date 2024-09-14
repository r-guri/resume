<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }
        .title {
            font-size: 18px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            line-height: 1.5;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="title">Invoice #kk</div>
        <table>
            <tr>
                <td><strong>Date:</strong> hh</td>
            </tr>
            <tr>
                <td><strong>Customer:</strong> jj</td>
            </tr>
        </table>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <!-- @foreach($invoice->items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                    </tr>
                @endforeach -->
            </tbody>
        </table>
    </div>
</body>
</html>
