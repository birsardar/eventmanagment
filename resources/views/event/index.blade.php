<!-- resources/views/event/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">All Events</h1>
        <a href="{{ route('events.create') }}" class="btn btn-primary mb-3">Create New Event</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="events-table-body">
                <!-- Event rows will be populated by JavaScript -->
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        async function loadEvents() {
            try {
                const response = await axios.get('/api/events', {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('auth_token')
                    }
                });

                const eventsTableBody = document.getElementById('events-table-body');
                eventsTableBody.innerHTML = '';

                response.data.data.forEach(event => {
                    const row = `<tr>
                                <td>${event.title}</td>
                                <td>${event.description}</td>
                                <td>${event.date}</td>
                                <td>${event.location}</td>
                                <td>
                                    <a href="/event/${event.id}" class="btn btn-info btn-sm">View</a>
                                    <a href="/event/${event.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <button onclick="deleteEvent(${event.id})" class="btn btn-danger btn-sm">Delete</button>
                                </td>
                             </tr>`;
                    eventsTableBody.innerHTML += row;
                });
            } catch (error) {
                console.error('Error loading events:', error);
            }
        }

        async function deleteEvent(id) {
            if (confirm('Are you sure you want to delete this event?')) {
                try {
                    await axios.delete(`/api/events/${id}`, {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('auth_token')
                        }
                    });
                    alert('Event deleted successfully');
                    loadEvents(); // Reload events
                } catch (error) {
                    console.error('Error deleting event:', error);
                }
            }
        }

        // Load events when the page loads
        loadEvents();
    </script>
</body>

</html>
