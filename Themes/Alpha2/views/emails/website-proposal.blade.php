<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Website Proposal in Gallery</title>
</head>
<body>
<h1>New Website Proposal</h1>

<p>Someone has contacted you to add a new website on the AsgardCms Gallery</p>
<ul>
    <li>Name: {{ $data['name'] }}</li>
    <li>Email: {{ $data['email'] }}</li>
    <li>Website URL: <a href="{{ $data['website_url'] }}">{{ $data['website_url'] }}</a></li>
    <li>Message: {{ $data['message'] }}</li>
</ul>

<p>Reply to this email to contact the person.</p>

</body>
</html>
