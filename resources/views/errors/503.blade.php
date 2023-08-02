{{--@extends('errors::minimal')--}}

{{--@section('title', __('Service Unavailable'))--}}
{{--@section('code', '503')--}}
{{--@section('message', __('Service Unavailable'))--}}
    <!DOCTYPE html>
<html>
<head>
    <title>503 Site Down For Maintenance </title>
    <style>
        /* Custom CSS styles for the error page */
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
        }

        h1 {
            color: #333333;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>503 Site Down For Maintenance</h1>
    <p>The website is down for maintenance please check back later.</p>
</div>
</body>
</html>
