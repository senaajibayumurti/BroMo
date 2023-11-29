<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Test</title>
</head>
<body>

<h1>API Test Page</h1>
<p>Open the browser console to see the API response.</p>

<script>
    const apiUrl = 'http://127.0.0.1:8080/api/kandang'; // Update the URL based on your API endpoint
    const token = 'Bearer 7|laravel_sanctum_JYgufVpwxjV3looGhw084botoQswPUwcpoymGRaW9b847d24'; // Replace with your actual token

    fetch(apiUrl, {
        method: 'GET',
        headers: {
            'Authorization': token,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log('API Response:', data);
        // Handle the data as needed (update the DOM, etc.)
    })
    .catch(error => {
        console.error('API Error:', error);
    });
</script>

</body>
</html>
