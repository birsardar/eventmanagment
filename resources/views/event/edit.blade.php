<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Event</h1>
        <form action="{{ route('events.update', $event->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Title Field -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control"
                    value="{{ old('title', $event->title) }}" required>
            </div>

            <!-- Description Field -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control" required>{{ old('description', $event->description) }}</textarea>
            </div>

            <!-- Date Field -->
            @php
                use Illuminate\Support\Carbon;
            @endphp
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" id="date" name="date" class="form-control"
                    value="{{ old('date', $event->date ? Carbon::parse($event->date)->format('Y-m-d') : '') }}"
                    required>
            </div>

            <!-- Location Field -->
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" id="location" name="location" class="form-control"
                    value="{{ old('location', $event->location) }}" required>
            </div>

            <!-- Category Dropdown -->
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $event->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Attendees Multi-Select Dropdown -->
            <div class="mb-3">
                <label for="attendee_id" class="form-label">Attendees</label>
                <select id="attendee_id" name="attendee_id[]" class="form-control" multiple>
                    @foreach ($attendees as $attendee)
                        <option value="{{ $attendee->id }}"
                            {{ in_array($attendee->id, $event->attendees->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $attendee->name }}
                        </option>
                    @endforeach
                </select>
                <small class="form-text text-muted">Hold down Ctrl (Windows) or Command (Mac) to select multiple
                    attendees.</small>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Update Event</button>
        </form>
    </div>
</body>

</html>
