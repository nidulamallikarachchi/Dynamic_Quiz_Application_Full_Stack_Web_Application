<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz</title>
    <link rel="stylesheet" href="styles/4.1.Quiz.css">
    <link rel="stylesheet" href="styles/8.3.Page_Transition.css">
    <link rel="icon" href="images/quiz-icon.png">
</head>
<body>
<div id="top-of-page"></div>
<?php include("menu.inc");?>
<div class="container">
    <h1>Let's Test Your Knowledge!</h1>
    <form id="quizForm" action="4.2.Mark_Quiz.php" method="post">

        <h3 >Enter Your Personal Details to Start The Quiz</h3>
        <fieldset class="personal-info" id="personal-info">
            <h4>First Name: </h4>
            <input type="text" id="firstName" name="firstName" required maxlength="30" pattern="^[a-zA-Z\- ]{1,30}$">

            <h4>Last Name: </h4>
            <input type="text" id="lastName" name="lastName" required maxlength="30" pattern="^[a-zA-Z\- ]{1,30}$">

            <h4>Student Number: </h4>
            <input type="text" id="studentNumber" name="studentNumber" required pattern="[0-9]{7,10}">

        </fieldset>

        <fieldset class="radio-questions">
            <legend><h3>Select only One Answer for the Following Questions</h3></legend>

            <h2>1. What is jQuery?></h2>
            <label for="q1a1"><input type="radio" id="q1a1" name="q1" value="q1a1" required>A JavaScript library</label>
            <label for="q1a2"><input type="radio" id="q1a2" name="q1" value="q1a2">A styling framework</label>
            <label for="q1a3"><input type="radio" id="q1a3" name="q1" value="q1a3" >A server-side scripting language</label>
            <label for="q1a4"><input type="radio" id="q1a4" name="q1" value="q1a4" >A database management system</label>

            <h2>2. How do you include jQuery in an HTML document?</h2><br>
            <label for="q2a1"><input type="radio" id="q2a1" name="q2" value="q2a1" required> Using the &lt;script&gt; tag with a link to the jQuery library</label>
            <label for="q2a2"><input type="radio" id="q2a2" name="q2" value="q2a2"> Using the &lt;link&gt; tag with a link to the jQuery library</label>
            <label for="q2a3"><input type="radio" id="q2a3" name="q2" value="q2a3"> Using the &lt;style&gt; tag with jQuery code</label>
            <label for="q2a4"><input type="radio" id="q2a4" name="q2" value="q2a4"> Using the &lt;import&gt; tag with jQuery code</label>

            
            <h2>3. What is the purpose of the $(document).ready() function in jQuery?</h2><br>
            <label for="q3a1"><input type="radio" id="q3a1" name="q3" value="q3a1" required> It is used to define a new jQuery method</label>
            <label for="q3a2"><input type="radio" id="q3a2" name="q3" value="q3a2"> It is used to handle AJAX requests</label>
            <label for="q3a3"><input type="radio" id="q3a3" name="q3" value="q3a3"> It is used to delay the execution of jQuery code</label>
            <label for="q3a4"><input type="radio" id="q3a4" name="q3" value="q3a4"> It is used to execute code when the DOM is fully loaded</label>

            
            <h2>4. How can you select all elements with a specific class using jQuery?</h2><br>
            <label for="q4a1"><input type="radio" id="q4a1" name="q4" value="q4a1" required> $("element")</label>
            <label for="q4a2"><input type="radio" id="q4a2" name="q4" value="q4a2"> $(".classname")</label>
            <label for="q4a3"><input type="radio" id="q4a3" name="q4" value="q4a3"> $("#id")</label>
            <label for="q4a4"><input type="radio" id="q4a4" name="q4" value="q4a4"> $("tagname")</label>

            
            <h2>5. To fade out an element, which method should be used in jQuery?</h2><br>
            <label for="q5a1"><input type="radio" id="q5a1" name="q5" value="q5a1" required> .hide()</label>
            <label for="q5a2"><input type="radio" id="q5a2" name="q5" value="q5a2"> .fadeOut()</label>
            <label for="q5a3"><input type="radio" id="q5a3" name="q5" value="q5a3"> .fadeIn()</label>
            <label for="q5a4"><input type="radio" id="q5a4" name="q5" value="q5a4"> .fadeOutTo()</label>

        </fieldset>
        <fieldset class="multi-select-questions">
            <legend><h3>Select One or Multiple Answers for the following Questions (8-9)</h3></legend>

            <h2>6. Which jQuery method is used to hide selected elements?</h2><br>

            <label for="q6a1"><input type="checkbox" id="q6a1" name="q6[]" value="q6a1" >hide()</label>
            <label for="q6a2"><input type="checkbox" id="q6a2" name="q6[]" value="q6a2" >catch()</label>
            <label for="q6a3"><input type="checkbox" id="q6a3" name="q6[]" value="q6a3" >mouseenter()</label>
            <label for="q6a4"><input type="checkbox" id="q6a4" name="q6[]" value="q6a4" >hover()</label>
            <label for="q6a5"><input type="checkbox" id="q6a5" name="q6[]" value="q6a5" >activate()</label>

            <h2>7. To add content to an element using jQuery, you would use?</h2><br>

            <label for="q7a1"><input type="checkbox" id="q7a1" name="q7[]" value="q7a1" >rotate()</label>
            <label for="q7a2"><input type="checkbox" id="q7a2" name="q7[]" value="q7a2" >zoomIn()</label>
            <label for="q7a3"><input type="checkbox" id="q7a3" name="q7[]" value="q7a3" >append()</label>
            <label for="q7a4"><input type="checkbox" id="q7a4" name="q7[]" value="q7a4" >hide()</label>
            <label for="q7a5"><input type="checkbox" id="q7a5" name="q7[]" value="q7a5" >delay()</label>
        </fieldset>

         <fieldset class="input-options-questions">
            <legend><h3>Select an Option from the Drop-Down List For the following Questions (10-11)</h3></legend>

            
            <h2>8. Which symbol is used as a shortcut for jQuery?</h2>
            <select id="q8" name="q8" class="select" required>
                <option value="" disabled selected>Select an option</option>
                <option id="q8a1" value="q8a1">#</option>
                <option id="q8a2" value="q8a2">$</option>
                <option id="q8a3" value="q8a3">&</option>
                <option id="q8a4" value="q8a4">%</option>
            </select>
        </fieldset>

        <fieldset class="text-questions">
            <legend><h3>Write the Answers for The Following Questions (9-10)</h3></legend>
            <h2>9. Is it possible to use jQuery together with AJAX?</h2>
            <input type="text" id="q9" name="q9" maxlength="20" placeholder="Enter yes or no..." required ><br>
        </fieldset>

            <h2>10. How can you get the index of a specific element with the class "my-element" using jQuery, and ensure that the answer is an integer?</h2> <br>
            <p>1. $(".my-element").index()</p> <br>
            <p>2. parseInt($(".my-element").index())</p> <br>
            <p>3. Number($(".my-element").index())</p> <br>
            <p>4. $(".my-element").index().toInteger()</p> <br>
            <input type="number" id="q10" name="q10" maxlength="20" placeholder="Enter a number..." required ><br>


        <div class="buttons">
            <input type="reset" value="Discard">
            <input type="submit" value="Submit Answers">
        </div>
    </form>

</div>

<?php
include "footer.inc";
?>


</body>
</html>
