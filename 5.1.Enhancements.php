<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enhancements</title>
    <link rel="stylesheet" href="styles/5.Enhancements.css">
    <link rel="stylesheet" href="styles/8.3.Page_Transition.css">
    <link rel="icon" href="images/enhancement-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/styles/github-gist.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/highlight.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/languages/php.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/languages/sql.min.js"></script>
</head>

<body>
<div id="top-of-page"></div>
<?php include("menu.inc"); ?>
<div class="container">
    <h1>Enhancements</h1>
    <p>Our webpage, made by our team of five, is loaded with cool stuff on the "Enhancements" page. We got smooth scrolling that makes browsing super sleek. Hover actions? Yeah, we nailed those too - things light up and pop when you hover over 'em. And don't get me started on the transition effects - they're like magic as you move around the site. It's like a digital playground of awesomeness. So, come check it out and enjoy the ride through our tech
        wonders. We're pretty proud of what we've cooked up and can't wait to share it with you!</p>
    <div class="enhancement">
        <h2>Hover Effect On the Menu Bar</h2>
        <h3>Hover over a menu bar item to see this effect.</h3>
        <h4>Here's How We Implemented This Feature:</h4>
        <div class="code-snip">
            <div class="heading"><span style="color: red;">HTML</span></div>
            <div><pre><code class="html">
&lt;header&gt;
    &lt;h2 class="logo"&gt;jQuery&lt;/h2&gt;
    &lt;nav class="menu"&gt;
        &lt;a href="1.Index.html"&gt;Home&lt;/a&gt;
        &lt;a href="2.Topic%201.html"&gt;Topic&lt;/a&gt;
        &lt;a href="3.Quiz.html"&gt;Quiz&lt;/a&gt;
        &lt;a href="4.Enhancements.html"&gt;Enhancements&lt;/a&gt;
        &lt;a href="5.About%20Us.html"&gt;About Us&lt;/a&gt;
    &lt;/nav&gt;
&lt;/header&gt;
                    </code></pre>
            </div>
        </div>
        <div class="code-snip">
            <div class="heading"><span style="color: blue;">CSS</span></div>
            <div><pre><code class="css">
header {
    border-radius: 0 0 10px 10px;
    background-image: linear-gradient(to top, rgba(184, 216, 216, 0), #B8D8D8);
    background-color: transparent;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
                    </code></pre>
            </div>
        </div>
        <div class="code-snip">
            <div class="heading"><span style="color: blue;">CSS</span></div>
            <pre><code class="css">
.logo {
    font-size: 2em;
    color: black;
    user-select: none;
}
                    </code></pre>
        </div>
        <div class="code-snip">
            <div class="heading"><span style="color: blue;">CSS</span></div>
            <pre><code class="css">
.menu a {
    position: relative;
    font-size: 1.1em;
    color: black;
    text-decoration: none;
    font-weight: 500;
    margin-left: 30px;
}
                    </code></pre>
        </div>
        <div class="code-snip">
            <div class="heading"><span style="color: blue;">CSS</span></div>
            <pre><code class="css">
.menu a::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background-color: black;
    border-radius: 5px;
    transform-origin: right;
    transform: scaleX(0);
    transition: transform 0.5s;
}
                    </code></pre>
        </div>
        <div class="code-snip">
            <div class="heading"><span style="color: blue;">CSS</span></div>
            <pre><code class="css">
.menu a:hover::after {
    transform-origin: left;
    transform: scaleX(1);
}
                    </code></pre>
        </div>
        <div class="enhancement">
            <h2>Smooth Scroll</h2>
            <h3>Click This Button</h3>
            <div class="button">
                <a href="#top-of-page"><img src="images/up-arrow.png" alt="Button to go to the top of the page"></a>
            </div>
            <h4>Here's How We Implemented This Feature:</h4>
            <div class="code-snip">
                <div class="heading"><span style="color: blue;">CSS</span></div>
                <pre><code class="css">
html {
    scroll-behavior: smooth;
}
                    </code></pre>
            </div>
        </div>
        <div class="enhancement">
            <h2>Smooth Page Transition</h2>
            <h3>Click This Button</h3>
            <div class="button">
                <a href="5.1.Enhancements.php"><img src="images/refresh_FILL0_wght400_GRAD0_opsz48.png" alt="refresh screen button"></a>
            </div>
            <h4>Here's How We Implemented This Feature:</h4>
            <div class="code-snip">
                <div class="heading"><span style="color: blue;">CSS</span></div>
                <pre><code class="css">
.container {
    animation: transitionIn 1s;
}
                    </code></pre>
            </div>
        </div>
        <div class="enhancement">
            <div class="code-snip">
                <div class="heading"><span style="color: blue;">CSS</span></div>
                <pre><code class="css">
@keyframes transitionIn {
    from {
        opacity: 0;
        transform: rotateX(-5deg);
    }
    to {
        opacity: 1;
        transform: rotateX(0);
    }
}
                    </code></pre>
            </div>
        </div>
        <div class="enhancement">
            <h2>Contact Cards</h2>
            <h3>Click This Button</h3>
            <div class="button">
                <a href="6.1.About_Us.php"><img src="images/aboutus-icon.png" alt="Button to go to about page"></a>
            </div>
            <h4>Here's How We Implemented This Feature:</h4>
            <div class="code-snip">
                <div class="heading"><span style="color: red;">HTML</span></div>
                <pre><code class="html">
&lt;div class="contact-card"&gt;
    &lt;img src="images/demoprofile.png"&gt;
    &lt;h2&gt;Savindu&lt;br&gt;Wickramasinghe&lt;/h2&gt;&lt;br&gt;
    &lt;h3&gt;Front-End&lt;br&gt;Development&lt;/h3&gt;
    &lt;br&gt;
    &lt;h4&gt;Contact Me&lt;/h4&gt;
    &lt;span&gt;
        &lt;a href="mailto:savinduwickr@gmail.com"&gt;
            &lt;img src="images/mail.png"&gt;
        &lt;/a&gt;
        &lt;a href="#"&gt;
            &lt;img src="images/call.png"&gt;
        &lt;/a&gt;
    &lt;/span&gt;
    &lt;h4&gt;Student ID: 104834960&lt;/h4&gt;
&lt;/div&gt;
                    </code></pre>
            </div>
            <div class="code-snip">
                <div class="heading"><span style="color: blue;">CSS</span></div>
                <pre><code class="css">
.content .contact-card {
    color: white;
    transition: background-color 0.5s ease;
}
                    </code></pre>
            </div>
            <div class="code-snip">
                <div class="heading"><span style="color: blue;">CSS</span></div>
                <pre><code class="css">
.content .contact-card:hover {
    color: black;
    background-color: #B8D8D8;
    transition: background-color 0.5s ease;
}
                    </code></pre>
            </div>
            <div class="code-snip">
                <div class="heading"><span style="color: blue;">CSS</span></div>
                <pre><code class="css">
.content div img {
    margin: 20px;
    position: relative;
    height: 150px;
    border-radius: 50%;
}
                    </code></pre>
            </div>
            <div class="code-snip">
                <div class="heading"><span style="color: blue;">CSS</span></div>
                <pre><code class="css">
.contact-card a img {
    height: 40px;
}
                    </code></pre>
            </div>
        </div>
        <div class="enhancement">
            <h2>Smooth Button Transitions</h2>
            <h3>Hover Over This Button</h3>
            <div class="button">
                <a href="#"><img src="images/click.png" alt="Button to go to about page"></a>
            </div>
            <h4>Here's How We Implemented This Feature:</h4>
            <div class="code-snip">
                <div class="heading"><span style="color: red;">HTML</span></div>
                <pre><code class="html">
&lt;div class="btn"&gt;&lt;a href="https://jquery.com/download/"&gt;&lt;button&gt;Download&lt;/button&gt;&lt;/a&gt;&lt;/div&gt;
                    </code></pre>
            </div>
            <div class="code-snip">
                <div class="heading"><span style="color: blue;">CSS</span></div>
                <pre><code class="css">
button {
    padding: 10px 30px;
    font-size: 1.2em;
    border-radius: 50px;
    background-color: transparent;
    transition: background-color 0.5s ease;
}
                    </code></pre>
            </div>
            <div class="code-snip">
                <div class="heading"><span style="color: blue;">CSS</span></div>
                <pre><code class="css">
button:hover {
    background-color: black;
    color: white;
    transition: background-color 0.5s ease;
}
                    </code></pre>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.inc";
?>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        document.querySelectorAll('pre code').forEach((block) => {
            hljs.highlightBlock(block);
        });
    });
</script>
</body>
</html>