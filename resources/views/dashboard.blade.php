<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 10px;
            padding: 20px;
            flex: 1 1 calc(33.333% - 40px);
            box-sizing: border-box;
        }

        .card h3 {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Dashboard</h1>
    </div>
    <div class="container">
        <div class="card">
            <h3>Card 1</h3>
            <p>Some content for card 1.</p>
        </div>
        <div class="card">
            <h3>Card 2</h3>
            <p>Some content for card 2.</p>
        </div>
        <div class="card">
            <h3>Card 3</h3>
            <p>Some content for card 3.</p>
        </div>
    </div>
</body>

</html>
