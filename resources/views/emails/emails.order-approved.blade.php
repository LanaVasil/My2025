<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Approved</title>
</head>
<body>
    <h1>Order Approved</h1>
    <p>Dear {{ $order->user->name }},</p>
    <p>We are happy to inform yuo that your has approved.</p>
    <p><strong>Order Details</strong></p>
    <ul>
        <li><strong>Order ID:</strong> {{ $order->id }}</li>
        <li><strong>Device:</strong> {{ $order->device->name }}</li>
        <li><strong>Total:</strong> XXX</li>
    </ul>

    <p>Thank you choosing our service! You can track your order delivery here....</p>
</body>
</html>
