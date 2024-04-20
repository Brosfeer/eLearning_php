<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST["text"];

    // قم بمعالجة القيمة المرسلة من JavaScript هنا
    echo "The received text is: " . $text;
}
?><div class="single-widget category">
<h3 class="title"><?php echo $titleCourse ?></h3>
<ul class="categor-list">
    <li><a href="#" onclick="sendToPhp('<?php echo $titleLessonsOne ?>');"><?php echo $titleLessonsOne ?></a></li>
    <li><a href="#" onclick="sendToPhp('<?php echo $titleLessonsSecond ?>');"><?php echo $titleLessonsSecond ?></a></li>
    <li><a href="#" onclick="sendToPhp('<?php echo $titleLessonsThreed ?>');"><?php echo $titleLessonsThreed ?></a></li>
    <li><a href="#" onclick="sendToPhp('<?php echo $titleLessonsFourth ?>');"><?php echo $titleLessonsFourth ?></a></li>
</ul>
</div>

<script>
function sendToPhp(text) {
// إنشاء نموذج وإرساله إلى ملف PHP
var form = document.createElement("form");
form.setAttribute("method", "POST");
form.setAttribute("action", "path/to/your-php-file.php");

var input = document.createElement("input");
input.setAttribute("type", "hidden");
input.setAttribute("name", "text");
input.setAttribute("value", text);
form.appendChild(input);

document.body.appendChild(form);
form.submit();
}
</script>