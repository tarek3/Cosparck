<!DOCTYPE html>
<html lang="en">
<head>
<link href="assets/css/style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Select</title>
    <style>
        * {
            transition: 0.5s ;
        }
        body, html {
            margin: 0;
            padding: 0;
            height: 100vh; /* Full viewport height */
            overflow: hidden;
        }

        .image-container {
            display: flex; /* Flex layout for side-by-side positioning */
            height: 100%; /* Full height to cover the page */
        }

        .image-wrapper {
            position: relative; /* Allows the card to be positioned relative to the image */
            width: 50%; /* Half the width for each image */
            height: 100%; /* Full height for each image */
        }

        .image-wrapper img {
            width: 100%; /* Full width of the wrapper */
            height: 100%; /* Full height of the wrapper */
            object-fit: cover; /* Ensures the image covers the area without distortion */
        }

        .card {
            position: absolute; /* Positions the card within the wrapper */
            top: 50%; /* Center vertically */
            left: 50%; /* Center horizontally */
            transform: translate(-50%, -50%); /* Corrects position to keep card centered */
            background-color: rgba(255, 255, 255); /* Semi-transparent background */
            padding: 20px; /* Padding for the card content */
            border-radius: 10px; /* Rounded corners */
            text-align: center; /* Centers text within the card */
            box-shadow: 0 0 20px black;
        }
        /* Default link style */
a {
    color: #007bff; /* Default color for links (blue) */
    text-decoration: none; /* No underline by default */
    transition: color 0.3s; /* Smooth color transition */
}

/* Hover effect for links */
a:hover {
    color: #0056b3; /* Darker blue on hover */
    text-decoration: underline; /* Underline on hover for emphasis */
}

/* Active link style (when clicked) */
a:active {
    color: #004080; /* Even darker blue when active */
}

/* Visited link style */
a:visited {
    color: #551a8b; /* Purple color for visited links */
}

/* If you want a specific style for links inside the card */
.card a {
    display: inline-block; /* Makes the link behave like a button */
    padding: 10px 20px; /* Padding for space around the text */
    background-color: #007bff; /* Background color for button links */
    color: white; /* White text */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    text-decoration: none; /* No underline */
    transition: background-color 0.3s; /* Smooth transition on hover */
    cursor: pointer; /* Change cursor to indicate clickability */
}

.card a:hover {
    background-color: #0056b3; /* Darken on hover */
    text-decoration: none; /* No underline */
}

    </style>
</head>
<body>

<div class="image-container">
    <div class="image-wrapper">
        <img src="assets/img/forme.webp" alt="First image">
        <div class="card">
            <h2>Formé</h2>
            <p>Cosparck propose une variété de formations qui vont au-delà de leurs produits, abordant des sujets comme la gestion d'entreprise, les compétences techniques, et le développement personnel</p>
            <a href="frm_sign_up.php">S'inscrire</a>
        </div>
    </div>

    <div class="image-wrapper">
        <img src="assets/img/entreprise.webp" alt="Second image">
        <div class="card">
            <h2>Entreprise</h2>
            <p>Cosparck propose des solutions pour les entreprises de toutes tailles, offrant des produits adaptés aux besoins des petites startups comme des grandes entreprises.</p>
            <a href="ent_sign_up.php">S'inscrire</a>
        </div>
    </div>
</div>

</body>
</html>
</div>

</body>
</html>
