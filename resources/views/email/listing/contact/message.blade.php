<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Inquiry About Your Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .banner-img {
            width: 100%; /* Make it full-width */
            height: 120px; /* Adjust height to make it narrower */
            object-fit: inherit; /* Ensures it crops properly while keeping aspect ratio */
            border-radius: 8px; /* Optional: rounds the corners slightly */
        }
    </style>
</head>
<body style="background-color: #f8f9fa; padding: 20px;">

    <div class="container bg-white p-4 rounded shadow-sm">
        
        <!-- Banner Image -->
        <div class="text-center mb-3">
            <img src="https://i.postimg.cc/JhXqbcgZ/9bbad1e1-87ee-4cc6-b539-438e9f937669-1.jpg" 
                 alt="Company Banner" 
                 class="banner-img">
        </div>

        <p class="fw-bold">Hi {{ $listing->user->name }},</p>

        <p>
            <strong>{{ $sender->name }}</strong> has reached out regarding your listing:
            <a href="{{ route('listings.show', [$listing->area, $listing]) }}" class="text-primary text-decoration-none">
                {{ $listing->title }}
            </a>.
        </p>

        <hr>

        @if(empty($body))
            <p class="text-muted fst-italic">No message provided.</p>
        @else
            <p class="fw-bold">Message:</p>
            <div class="border-start border-3 ps-3 bg-light p-2">
                {!! nl2br(e($body)) !!}
            </div>
        @endif

        <hr>

        <p>You can reply directly to this email to get in touch with <strong>{{ $sender->name }}</strong>.</p>

        <p class="mt-3 text-muted">Best regards,</p>
        <p class="fw-bold">Your Team</p>
    </div>

</body>
</html>
