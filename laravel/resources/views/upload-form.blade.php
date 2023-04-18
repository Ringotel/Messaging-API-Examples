<!DOCTYPE html>
<html>
<head>
    <title>File Upload Form</title>
</head>
<body>
    <h2>File Upload Form</h2>
    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <label for="orgid">Organization ID:</label>
        <input type="text" name="orgid" required><br><br>

        <label for="to">To:</label>
        <input type="text" name="to" required><br><br>

        <label for="from">From:</label>
        <input type="text" name="from" required><br><br>

        <label for="file">Select file:</label>
        <input type="file" name="file" required><br><br>

        <button type="submit">Upload</button>
    </form>
</body>
</html>