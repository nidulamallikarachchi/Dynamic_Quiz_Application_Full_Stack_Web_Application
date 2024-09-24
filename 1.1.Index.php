<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <meta content="Home Page" name="Nidula Mallikarachchi">
    <link rel="stylesheet" href="styles/1.Index.css">
    <link rel="stylesheet" href="styles/8.3.Page_Transition.css">
    <link rel="icon" href="images/home_FILL0_wght400_GRAD0_opsz48.png">
</head>
<body>
<div id="top-of-page"></div>
<?php include("menu.inc");?>

<div class="container">
    <div class="image"><img src="images/jquery-4096-black.png" alt="jQuery"></div>
    <div class="text">
        <h1 class="Pagagraph-Heading">Learn More About jQuery</h1>
        <br>
        <p class="Paragraph">
            jQuery is a JavaScript library that is lightweight, quick, and packed with features.
            It makes web development easier by offering a variety of strong tools and functionalities.
            Developers may easily alter HTML documents, handle events, produce animations, send AJAX calls, and interact
            with the DOM (Document Object Model) thanks to jQuery's succinct syntax. Due to its cross-browser portability
            and capacity to simplify difficult JavaScript operations with little code, jQuery—introduced in 2006—quickly
            became a hit. It abstracts a lot of browser inconsistencies, which makes it simpler for developers to design efficient
            code that is consistent across many browsers. The library's extensive ecosystem of plugins further expands
            its functionalities by providing answers for a variety of jobs like image sliders, form validation, and other things. Despite the emergence of newer
            JavaScript frameworks, jQuery is still prevalent and relevant, especially in projects whose objective is to improve user interactions
            and the overall user experience.

        </p>
    </div>

    <div class="btn"><a class="download-link" href="https://jquery.com/download/" id="download_link_id">Download</a></div>

    <div class="btn" id="video"><a class="download-link" href="https://youtu.be/8_uDYFdmShA">Assignment 1 Video</a></div>
    <div class="btn" id="video"><a class="download-link" href="https://youtu.be/Kn0Mmf4vhtA">Assignment 2 Video</a></div>
</div>

<?php
include "footer.inc";
?>

</body>
</html>