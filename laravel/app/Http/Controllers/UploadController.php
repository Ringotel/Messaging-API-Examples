<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // API endpoint URL
        $url = env('RINGOTEL_SERVER_URL');

        // Request headers
        $headers = [
            'Authorization: Bearer ' . env('RINGOTEL_API_KEY'),
        ];

        $file = $request->file("file");
        $filename = $file->getClientOriginalName();

        // Request parameters
        $data = [
            "orgid" => $request->input("orgid"),
            "to" => $request->input("to"),
            "from" => $request->input("from"),
            "file" => new \CURLFile($file, $file->getMimeType(), $filename),
        ];

        // Create a new cURL resource
        $ch = curl_init();

        // Set the URL and other cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the cURL request
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            // handle the error
        }

        // Close the cURL resource
        curl_close($ch);

        // Process the response
        // ...
    }
}
