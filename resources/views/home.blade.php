<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Additional custom styles */
        .card a {
            text-decoration: none;
            /* Remove underline from links */
            color: #333;
            /* Set link color */
            font-size: 1.2em;
        }

        .card a:hover {
            color: #007bff;
            /* Change color on hover */
        }
    </style>
</head>

<body>
    <div class="container-fluid p-3 bg-dark text-white text-center">
        <h1>Dashboard</h1>
    </div>

    <div class="container my-5">
        <div class="row g-4 justify-content-center">
            <!-- Category Card -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100 text-center p-4">
                    <h3><a href="{{ route('categories.index') }}">Category</a></h3>
                </div>
            </div>
            <!-- Events Card -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100 text-center p-4">
                    <h3><a href="{{ route('events.index') }}">Events</a></h3>
                </div>
            </div>
            <!-- Attendee Card -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100 text-center p-4">
                    <h3><a href="{{ route('attendee.index') }}">Attendee</a></h3>
                </div>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
