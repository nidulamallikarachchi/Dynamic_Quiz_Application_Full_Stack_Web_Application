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
    <div id="internal-sub-menu"><a href="3.2.Topic_Menu_2.php"><img src="images/menu.png" alt="menu"></a></div>

    <aside>
        <img src="images/image5.jpeg" alt="img">
    </aside>

    <section>
        <h3 id="ajax$$"> AJAX </h3>
        <p>
            AJAX (Asynchronous JavaScript and XML) involves loading data in the background so that it can be displayed
            on the website without requiring a page reload. <br>
            jQuery offers a number of ways to implement AJAX capabilities. You can use HTTP Get and HTTP Post to send text,
            HTML, XML, or JSON requests to a remote server using jQuery AJAX techniques. The external data may then be
            loaded right into the HTML parts of your website of your choosing.<br><br>

            Without jQuery, regular AJAX code writing can be a little challenging because different browsers implement
            AJAX differently. This implies that you will need to include additional code to test for various browsers. <br>
            However, jQuery enables us to create AJAX capability with just one line of code.</p> <br>

        <p> Here are some shortened Ajax requests:</p> <br>
        <table>
            <tr>
                <th>Method </th>
                <th>Equivalent </th>
            </tr>

            <tr>
                <td> $.get(url, data, success, dataType) </td>
                <td>
                    $.ajax({ <br>
                    url: url, <br>
                    data: data, <br>
                    success: success, <br>
                    dataType: dataType <br>
                    }); <br><br>

                    $.get( "ajax/test.html", function( data ) { <br>
                    $( ".result" ).html( data ); <br>
                    alert( "Load was performed." ); <br>
                    });<br>
                </td>
            </tr>

            <tr>
                <td>$.getJSON(url, data, success); </td>
                <td> $.ajax({ <br>
                    dataType: "json", <br>
                    url: url, <br>
                    data: data, <br>
                    success: success <br>
                    });<br>
                </td>
            </tr>

            <tr>
                <td>$.getScript(url, success); </td>
                <td>
                    $.ajax({<br>
                    url: url, <br>
                    dataType: "script", <br>
                    success: success <br>
                    });<br>
                </td>
            </tr>

            <tr>
                <td>$.post( url, data, success, dataType) </td>
                <td>

                    $.ajax({<br>
                    type: "POST", <br>
                    url: url, <br>
                    data: data, <br>
                    success: success, <br>
                    dataType: dataType <br>
                    }); <br>
                </td>
            </tr>


        </table>

    </section>


    <section>

        <h3 id="plug$$"> Plugins </h3>

        <p>
            Plugins and extensions allow jQuery to extend its capabilities to obtain new techniques allowing you to perform
            additional operations. It expands jQuery's prototype object and allows web developers to solve specific problems
            that cannot be solved by the existing functionalities included in the core jQuery library.<br>
        </p>

    </section>

    <section>

        <h3 id="chain$$"> Chaining </h3>

        <p>
            By using jQuery you have the ability to connect actions and methods together.
            Chaining enables us to execute jQuery methods (on the same element) all in one statement
            To create a chain of actions you just add the action after the previous one.
            Here's an example that demonstrates chaining the css() slideUp() and slideDown() methods.
            The "c1" element initially turns red then it slides up. Finally, it slides back down.
            $(<span class="special">"#c1"</span>).css(<span class="special">"color"</span>, <span class="special">"blue"</span>)
            .slideUp(<span class="special2">2200</span>).slideDown(<span class="special2">2200</span>);
            When you chain code together the line of code can become quite lengthy. However, jQuery is
            not overly strict when it comes to syntax. You have the freedom to format it however you prefer,
            including using line breaks and indentations as you see fit.

        </p>
    </section>

    <aside>
        <img src="images/image6.jpeg" alt="img">
    </aside>
    <section>


        <h3 id="jed_eud$$"> jQuery Event Delegation and UnDelegation </h3>

        <p>
            How this function works- </p> <br>

        <ol>
            <li>Whenever a &lt;p&gt; element is clicked the event is passed up to its parent (div.container) since the &lt;p&gt; itself
                doesn't have an event handler.</li>
            <li>The parent element, having an event handler takes care of the bubbled event.</li>
            <li>There is no need to manually add a click event handler to a new &lt;p&gt; element that is dynamically generated. Because
                the newly formed &lt;p&gt; is a child of the same parent element (div.container), its click event will bubble up to the parent
                and be handled there</li>
        </ol>

        <!--            <img src="Images/event.png" alt="event" id="eventpng">-->
        <br>

        <p> The delegate() method adds one or more event handlers for specified components that are children of selected sections and a
            function to perform when the events occur. Event handlers associated with the delegate() function will operate for both current
            and FUTURE items (such as a script-created element).<br>
            This can be done in paragraphs, ordered lists, unordered lists, etc.

        </p>

    </section>

    <section>

        <h3 id="jtemplates$$"> jQuery Templates </h3>

        <p>
            Code may be written quickly, efficiently, and cleanly using JQuery templates. For the purpose of producing the client HTML output,
            JQuery templates allow you to easily construct a template and provide it the JSON data.<br>
            Two Alternative Methods for Rendering a JQuery Template.</p>  <br>

        <ol>
            <li>
                The.tmpl() function allows you to pass a string that contains the data expression and the child HTML elements. The syntax is shown below.<br><br>
                <span class="code">
              $.tmpl(<span class="special">"&lt;tr&gt;&lt;td&gt;${Column1}&lt;/td&gt;&lt;td&gt;${Column2}&lt;/td&gt;&lt;/tr&gt;"</span>, dataObject)
              .appendTo(<span class="special">"#yourHtmlContainer"</span>);
              </span>
            </li>

            <li>
                Additionally, you may create a template that you can reuse later to link data to an HTML container control. The syntax is shown below.<br><br>
                <span class="code">
              $(<span class="special">"#yourTemplate"</span>).tmpl(dataObject).appendTo(<span class="special">"yourContainerControl"</span>);
              </span>
            </li>
        </ol>
    </section>

    <section>

        <h3 id="mobile$$">Mobile Friendly Development</h3>

        <p>
            With the jQuery Mobile framework, the motto "write less, accomplish more" is advanced to a new level: Instead of having to build
            unique programs for each mobile device or OS, the jQuery mobile framework enables you to create a single, highly branded responsive
            website or application that will work on all popular smartphones, tablets, and desktop platforms.<br><br>

            jQuery is able to provide a large selection of configurable skins for web and mobile apps thanks to the Theme Roller and HTML5's strong
            infrastructure. A stable version of jQuery Mobile or a customized framework are both options. With PhoneGap and other mobile app development
            frameworks, JQuery integrates seamlessly. This framework is quite compact in size, and Pl compatibility is both thorough and straightforward.
        </p>

    </section>


    <section>

        <h3 id="jcompatibility$$"> jQuery Cross Browser Compatibility </h3>

        <p>
            Desktop</p>

        <ul>
            <li>Chrome: (Current - 1) and Current </li>
            <li>Edge: (Current - 1) and Current</li>
            <li>Firefox: (Current - 1) and Current, ESR </li>
            <li>Internet Explorer: 9+ </li>
            <li>Safari: (Current - 1) and Current</li>
            <li>Opera: Current</li>
        </ul>

        <p> Mobile</p>

        <ul>
            <li>Stock browser on Android 4.0+ </li>
            <li>Safari on iOS 7+ </li>
        </ul>
    </section>


    <section>


        <h3 id="jolderv$$"> Migration From Older Versions </h3>

        <p>
            The jQuery Migrate plugin will be your greatest buddy if you want to work on changing the jQuery version in your code.
            By identifying and flagging sections of code that need to be updated, jQuery Migrate is a fantastically helpful tool
            that greatly simplifies the upgrade process.<br><br>
            All you need to do is include it on your website along with the updated version of jQuery, and the plugin will replace
            any deprecated functionality in the older version of jQuery (preventing code errors). After that, it sends a warning
            with a stack trace in the browser console so you can really discover the deprecated item in your code. <br><br>

            In essence, the plugin shouts at you through the browser console rather than letting your code erupt in a slaughter
            of errors. To assist you in finding the problematic code, it even spits out a stack trace.<br><br>

        </p>
    </section>

    <section>


        <h3 id="jtips$$">Best practices and tips</h3>


        <dl>

            <dt>Avoid Use of Too Much jQuery </dt>

            <dd>Minimize scripts in code for better performance and maintainability by
                using CSS and HTML animations instead of unnecessary scripts. </dd>

            <dt>Understand jQuery </dt>

            <dd>jQuery performs numerous tasks using JavaScript code, with multiple methods, functions, and events for specific actions.
                Identifying the best method for each action is crucial for efficient functionality. </dd>

            <dt>Always Use the latest version of jQuery </dt>

            <dd>jQuery updates include bug fixes, performance enhancements, new methods, and removals. It's essential to always use the latest
                version or CDN file for benefits. </dd>

            <dt>Use jQuery Chain Method </dt>

            <dd>jQuery enables adding actions/methods to a selector, improving performance, making code short, and easy to manage,
                with the chain starting from left to right.</dd>

            <dt>Do Not Repeat Yourself  </dt>

            <dd>Don't repeat yourself (DRY) is crucial for improved readability, flexibility, cost efficiency, testing,
                and quality in code, leading to maintainable and efficient development. </dd>

            <dt>Use External file of jQuery </dt>

            <dd>Place jQuery code in an external file for caching, readable code, easier management, CDN hosting, and minifying JS,
                despite extra HTTP requests. </dd>

            <dt>Delegate Where Possible </dt>

            <dd>Attach a single event handler to a parent using an id and delegate to the child/descendant, then call on the eventTarget. </dd>

            <dt>Keep your Code Safe </dt>

            <dd>To avoid name clashing in distribution code, use jQuery's noConflict() or store code in an anonymous function, then pass jQuery to it. </dd>

        </dl>
    </section>


    <hr>
    <br>

    <section id="references">
        <h3 id="ref">References</h3>

        <ol>

            <li>
                <a href="#ajax$$" class="reflink">
                    jQuery AJAX Introduction. (n.d.). jQuery AJAX Introduction.
                </a><br>
                <a href="https://www.w3schools.com/jquery/jquery_ajax_intro.asp#:~:text=What%20is%20AJAX%3F" class="web-ref"> https://www.w3schools.com/jquery/jquery_ajax_intro.asp#:~:text=What%20is%20AJAX%3F
                </a>
            </li>

            <li>
                <a href="#chain$$" class="reflink">
                    jQuery Chaining. (n.d.). jQuery Chaining.
                </a><br>
                <a href="https://www.w3schools.com/jquery/jquery_chaining.asp" class="web-ref">
                    https://www.w3schools.com/jquery/jquery_chaining.asp
                </a>
            </li>

            <li>
                <a href="#jed_eud$$" class="reflink">
                    jQuery Event Delegation and UnDelegation. (n.d.). Dot Net Tutorials.
                </a><br>
                <a href="https://dotnettutorials.net/lesson/jquery-event-delegation/" class="web-ref">
                    https://dotnettutorials.net/lesson/jquery-event-delegation/
                </a>
            </li>

            <li>
                <a href="#jtemplates$$" class="reflink">
                    Staff, C. (2012, May 4). Working with JQuery Templates | CodeGuru. CodeGuru.
                </a><br>
                <a href="https://www.codeguru.com/csharp/working-with-jquery-templates/" class="web-ref">
                    https://www.codeguru.com/csharp/working-with-jquery-templates/
                </a>
            </li>

            <li>
                <a href="#mobile$$" class="reflink">
                    M. (2022, November 24). Latest technologies to develop mobile application. Codezee.
                </a><br>
                <a href="https://codezeesolutions.com/latest-technologies-to-develop-mobile-application/" class="web-ref">
                    https://codezeesolutions.com/latest-technologies-to-develop-mobile-application/
                </a>
            </li>

            <li>
                <a href="#jolderv$$" class="reflink">
                    Wodarek, L. (2021, March 11). How to Update jQuery Versions - jQuery Migrate Plugin Guide | CQL. CQL.
                </a><br>
                <a href="https://www.cqlcorp.com/insights/updating-from-old-and-outdated-jquery-without-becoming-a-rage-monster/" class="web-ref">
                    https://www.cqlcorp.com/insights/updating-from-old-and-outdated-jquery-without-becoming-a-rage-monster/
                </a>
            </li>

            <li>
                <a href="#jtips$$" class="reflink">
                    17 Useful jQuery Tricks and Best Practices. (2019, March 27). TechBytes.
                </a><br>
                <a href="https://mundrisoft.com/tech-bytes/17-useful-jquery-tricks-and-best-practices/" class="web-ref">
                    https://mundrisoft.com/tech-bytes/17-useful-jquery-tricks-and-best-practices/
                </a>
            </li>
        </ol>

    </section>
</body>
<?php
include "footer.inc";
?>
</html>