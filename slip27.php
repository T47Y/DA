<?php
if (!isset($_POST['submit'])) {
echo '<form method="post" action="">
Font Style: <select name="font_style">
<option value="Arial">Arial</option>
<option value="Verdana">Verdana</option>
<option value="Times New Roman">Times New Roman</option>
</select><br>
Font Size: <input type="number" name="font_size" min="10" max="30"><br>
Font Color: <input type="color" name="font_color"><br>
Background Color: <input type="color" name="bg_color"><br>
<input type="submit" name="submit" value="Save Preferences">
</form>';
} else {
setcookie('font_style', $_POST['font_style'], time() + 86400);
setcookie('font_size', $_POST['font_size'], time() + 86400);
setcookie('font_color', $_POST['font_color'], time() + 86400);
setcookie('bg_color', $_POST['bg_color'], time() + 86400);
header("Location: display_preferences.php");
exit();
}
?>
<!-- Page 2 name- display_preferences.php -->
<?php
echo "<h2>Your Selected Settings:</h2>";
echo "Font Style: ".$_COOKIE['font_style']."<br>";
echo "Font Size: ".$_COOKIE['font_size']."<br>";
echo "Font Color: ".$_COOKIE['font_color']."<br>";
echo "Background Color: ".$_COOKIE['bg_color']."<br>";
echo '<a href="apply_settings.php">Apply These Settings</a>';
?>
<!-- Page 3 name - apply_settings.php -->
<?php
// Page 3: Apply the settings
echo '<style>
body {
font-family: '.$_COOKIE['font_style'].';
font-size: '.$_COOKIE['font_size'].'px;
color: '.$_COOKIE['font_color'].';
background-color: '.$_COOKIE['bg_color'].';
}
</style>';
echo "<h2>Your Settings Have Been Applied!</h2>";
echo "<p>This page demonstrates your selected preferences.</p>";
?>


import re
text = "hello 1234 this is @"
def preprocess_text(text):
text = re.sub(r'[^a-zA-Z\s]', '', text)
text = re.sub(r'\d+', '', text)
return text.lower()
preprocessed_text = preprocess_text(text)
print("Original Text:\n", text)
print("\nAfter processing text:\n", preprocessed_text)
