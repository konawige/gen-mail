<!DOCTYPE html>
<html>
<head>
    <title>AI Marketing Copy Generator</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>
    <h1>AI Marketing Copy Generator</h1>

    <form method="POST" action="/generate">
        @csrf
        <label>Product Name</label>
        <input type="text" name="product_name" value="{{ old('product_name', $product_name ?? '') }}" required>

        <label>Audience</label>
        <input type="text" name="audience" value="{{ old('audience', $audience ?? '') }}" required>

        <button type="submit">Generate</button>
    </form>

    @if(isset($result))
        <hr>
        <h2>Generated Copy</h2>
        <p><strong>Subject Line:</strong> {{ $result['subject_line'] ?? 'N/A' }}</p>
        <p><strong>Headline:</strong> {{ $result['headline'] ?? 'N/A' }}</p>
        <p><strong>Description:</strong> {{ $result['description'] ?? 'N/A' }}</p>
    @endif
</body>
</html>
