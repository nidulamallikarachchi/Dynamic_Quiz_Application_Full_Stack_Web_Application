<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Encyclopedia</title>
    <link rel="stylesheet" href="styles/2.Topic.css">
    <link rel="icon" href="images/topic-icon.png">
    <link rel="stylesheet" href="styles/8.3.Page_Transition.css">
</head>
<body>
<div id="top-of-page"></div>
<?php include("menu.inc");?>
<div class="container">
    <div id="internal-sub-menu"><a href="3.1.Topic_Menu_1.php"><img src="images/menu.png" alt="menu"></a></div>

    <h1 id="welcome">Welcome!</h1>
    <aside>
        <img src="images/image2.jpeg" alt="img">
    </aside>

    <h2> What is the Technology?   </h2>

    <section>
        <h3 id="intro$$">  Introduction - What jQuery can do. And how to use it </h3>

        <p>
            jQuery is a very powerful tool where its main intent is to make it more convenient and easier to use
            JavaScript when designing a webpage. It is a lightweight JavaScript library.
            It immensely reduces the workload of JavaScript by simplifying many lines of generic JavaScript code
            into a single line of coding. jQuery is extremely useful in the aspect that it can uncomplicate many
            functions of JavaScript, for example; AJAX calls and DOM manipulation. and is widely used in the web development community.
        </p>

        <h4>Below are features of the jQuery JavaScript library:</h4>

        <ul>
            <li>HTML/DOM manipulation</li>
            <li>CSS manipulation</li>
            <li>HTML event methods</li>
            <li>Effects and animations</li>
            <li>AJAX</li>
            <li>Utilities</li>
        </ul>
    </section>

    <section>
        <h3 id="jsyntax$$">jQuery Syntax</h3>

        <p><b>Basic syntax is:</b> &nbsp; $(selector).action()</p>

        <h4>Explanation:</h4>
        <ul>
            <li>$ sign to access jQuery</li>
            <li>(selector) to "query (or find)" HTML elements</li>
            <li>jQuery action() to be performed on the element(s)</li>
        </ul>

        <br>

        <h4>Examples:</h4>
        <p>$("div").hide() - hides all &lt;div> elements.<br>
            $("id%").hide() - hides the element with id="id%".<br>
            $(".class%").hide() - hides all elements with class="class%".
        </p>
    </section>

    <section>
        <h3 id="separatejs$$">Separate .js File </h3>
        <p>If your website has a lot of pages, And you want them to be simple to manage.
            You can place your jQuery functions in a <b>separate.js</b> file</p>

        <div class="code-snippet">
            <p>
                &lt;<span style="color: red">head</span>&gt;<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <span style="color: darkgreen">&lt;!--link jQuery library here--&gt;</span><br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &lt;<span style="color: red">script</span> <span style="color: sandybrown">src="jquery_functions_for_this_html.js"</span> >&lt;<span style="color: red">/script></span><br>
                &lt;<span style="color: red">/head</span>&gt;
            </p>
        </div>
    </section>

    <aside>
        <img src="images/image3.jpeg" alt="img">
    </aside>

    <section>
        <h3 id="jselect$$"> jQuery Selectors</h3>

        <p>
            jQuery selectors let users search for HTML elements using their id tag and operate on the HTML elements.
            The jQuery element selector selects elements based on the element name. You can select all &nbsp;<span style="color: red">&lt;p&gt; </span>&nbsp;   elements on a html page
            by  &nbsp;<span style="color: red">$("p")</span> &nbsp; selector. If you want to select a specific id on a html by &nbsp;<span style="color: red">$(#id)</span>&nbsp; selector.

        </p>

        <h4>Here are more selectors : </h4>

        <figure>
            <img src="images/jquery_selector.png" alt="jquery selector">
        </figure>
    </section>

    <section>

        <h3 id="dom_manip$$"> DOM manipulation </h3>
        <p>
            jQuery also allows users to operate DOM efficiently. jQuery gets rid of the huge complicated code required to set or get
            the information of any HTML element.
            (Document Object Model - is a standard that lets users produce, edit or remove elements from HTML documents)
            jQuery also allows users to traverse DOM with various methods to help search for elements in HTML documents either randomly
            or with a pattern. They will filter elements in a HTML document based on certain criteria.
        </p>

        <h4>There are 3 ways to traverse the DOM using jQuery:</h4>
        <ol>
            <li>Traversing Upwards </li>
            <li>Traversing Downwards </li>
            <li>Sideways </li>
        </ol>
    </section>

    <section>
        <h3 id="effects$$"> Effects </h3>
        <p>
            The jQuery library allows users to use several methods to
            add effects and animations to their web pages. The animation
            itself can be simple and generic, or it can be custom complex
            animations.</p>

        <h4>Example</h4>
        <span id="indent">jQuery has four fade methods for fading</span>
        <ul>
            <li>fadeOut()</li>
            <li>fadeIn()</li>
            <li>fadeToggle()</li>
            <li>fadeTo()</li>
        </ul>
        <br>
        <p>By fadeOut() the opacity of chosen parts was gradually decreased to provide a fading animation effect.
            It enables objects to gradually vanish from view over a certain amount of time. By fadeIn() gradually raising
            the opacity of certain pieces, this provides a smoothly appearing effect. It enables items to gradually come
            into visibility over a certain amount of time.</p>

        <p> Here are some-more effects:</p>

        <figure>
            <img src="images/effects.png" alt="effects" >
        </figure>
    </section>

    <aside>
        <img src="images/image4.jpeg" alt="img">
    </aside>

    <section>
        <h3 id="janimation$$"> jQuery Animations and Animation Queue </h3>

        <p>
            The animation queue is what is often used when the animate() function is used repeatedly. Instead of
            processing every call at once in parallel, by default, these calls are put into a queue and carried
            out one at a time. This queue is known as fx.<br>
            The queue for each HTML element is distinct. In the example that follows, each div element's queue will
            have 5 calls to the animation function. This indicates that the initial call to the animate function may
            begin to be executed more or less simultaneously by both div elements (.test1 &.test2). However, the queued
            methods are sequentially run from the provided queue.<br>

        </p>

    </section>

    <section>
        <h3 id="event_h$$"> Event handling And Methods </h3>
        <p>
            jQuery makes it easier to implement events than JavaScript. Events make the webpage interactive and when events
            are triggered, they can be used to perform a function. These custom functions are called Event Handlers.
        </p>

        <p>An event is a particular moment in time frame when something occurs.</p>
        <h4>Example:</h4>

        <ul>
            <li>Keydown and Keyup (key on the keyboard presses down or is released) </li>
            <li>selecting a radio button</li>
            <li>hovering mouse over an element</li>
        </ul>
        <br>
        <h4>Commonly Used jQuery Event Methods</h4>
        <br>

        <h5>$(document).ready()</h5>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;In order to run a function once the document has loaded completely,
            use the $(document).ready() method.</p>

        <h5>click()</h5>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;When a user clicks on an HTML element, the function is called.</p>

        <h5>dblclick()</h5>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;When a user double-clicks on an HTML element, the function is called.</p>

        <h5>mouseenter()</h5>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;When the mouse pointer reaches the HTML element, the function is called.</p>

        <h5>mouseleave()</h5>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;When the mouse pointer leaves from the HTML element, the function is called.</p>

        <h5>hover()</h5>

        <p>&nbsp;&nbsp;&nbsp;&nbsp;When the mouse enters an HTML element, the first function is called out,
            and when the mouse exits an HTML element, the second function is called out.</p>
    </section>

    <section>
        <h3 id="jmanipcss$$">jQuery Manipulating CSS</h3>

        <p>There are various CSS altering techniques in jQuery. These techniques let you dynamically modify the look and arrangement of html.
            Here are a few typical jQuery CSS manipulation techniques.</p>

        <ul>
            <li>addClass() - gives the chosen elements one or more classes.</li>
            <li>removeClass() - Deletes a class or classes from the chosen elements.</li>
            <li>toggleClass() - Toggles between adding/removing classes from the selected elements.</li>
            <li>css() - Sets or overrides the style attribute</li>
        </ul>
        <br>
    </section>
    <hr>
    <br>
    <section id="references">
        <h3>References</h3>
        <ol>
            <li>
                <a href="#intro$$" class="reflink">jQuery Introduction. (n.d.). jQuery Introduction.</a><br>
                <a href="https://www.w3schools.com/jquery/jquery_intro.asp" class="web-ref"> https://www.w3schools.com/jquery/jquery_intro.asp</a>
            </li>



            <li>
                <a href="#jsyntax$$" class="reflink">jQuery Syntax. (n.d.). jQuery Syntax.</a><br>
                <a href="https://www.w3schools.com/jquery/jquery_syntax.asp" class="web-ref"> https://www.w3schools.com/jquery/jquery_syntax.asp</a>
            </li>



            <li>
                <a href="#jselect$$" class="reflink">jQuery Selectors. (n.d.). jQuery Selectors.</a><br>
                <a href="https://www.w3schools.com/jquery/jquery_selectors.asp" class="web-ref"> https://www.w3schools.com/jquery/jquery_selectors.asp</a>
            </li>



            <li>
                <a href="#dom_manip$$" class="reflink">jQuery - DOM Manipulation. (n.d.). jQuery - DOM Manipulation | Tutorialspoint.a</a><br>
                <a href="https://www.tutorialspoint.com/jquery/jquery-dom.htm" class="web-ref"> https://www.tutorialspoint.com/jquery/jquery-dom.htm</a>
            </li>




            <li>
                <a href="#dom_manip$$" class="reflink">jQuery - DOM Traversing. (n.d.). jQuery - DOM Traversing | Tutorialspoint.</a><br>
                <a href="https://www.tutorialspoint.com/jquery/jquery-traversing.htm" class="web-ref"> https://www.tutorialspoint.com/jquery/jquery-traversing.htm</a>
            </li>


            <li>
                <a href="#effects$$" class="reflink"> - js.foundation, J. F. (n.d.). Effects | jQuery API Documentation. Effects | jQuery API Documentation. </a><br>
                <a href="https://api.jquery.com/category/effects/" class="web-ref"> https://api.jquery.com/category/effects/</a>
            </li>


            <li>
                <a href="#event_h$$" class="reflink">jQuery Event Methods. (n.d.). jQuery Event Methods.<br> </a>
                <a href="https://www.w3schools.com/jquery/jquery_events.asp" class="web-ref"> https://www.w3schools.com/jquery/jquery_events.asp</a>
            </li>

            <li>
                <a href="#jmanipcss$$" class="reflink">jQuery Get and Set CSS Classes. (n.d.). jQuery Get and Set CSS Classes.</a><br>
                <a href=" https://www.w3schools.com/jquery/jquery_css_classes.asp" class="web-ref"> https://www.w3schools.com/jquery/jquery_css_classes.asp</a>
            </li>

            <li>
                <a href="1.1.Index.php#download_link_id" class="reflink">
                    - js.foundation, J. F. (n.d.). Download jQuery | jQuery. Download jQuery | jQuery.
                </a><br>
                <a href="https://jquery.com/download/" class="web-ref">
                    https://jquery.com/download/
                </a>
            </li>

        </ol>
    </section>
</div>
<?php
include "footer.inc";
?>

</body>
</html>