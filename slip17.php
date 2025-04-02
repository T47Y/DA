<?php
if (!file_exists('student.xml')) {
$students = [
['rollno' => '101', 'name' => 'John Smith', 'address' => '123 Main St', 'college' =>
'ABC College', 'course' => 'CS'],
['rollno' => '102', 'name' => 'Emily Johnson', 'address' => '456 Oak Ave', 'college' =>
'XYZ College', 'course' => 'IT'],
['rollno' => '103', 'name' => 'Michael Brown', 'address' => '789 Pine Rd', 'college' =>
'ABC College', 'course' => 'ME'],
['rollno' => '104', 'name' => 'Sarah Davis', 'address' => '321 Elm St', 'college' =>
'DEF College', 'course' => 'CS'],
['rollno' => '105', 'name' => 'David Wilson', 'address' => '654 Maple Ave', 'college'
=> 'XYZ College', 'course' => 'IT']
];
$xml = new SimpleXMLElement('<students></students>');
foreach ($students as $student) {
$studentNode = $xml->addChild('student');
$studentNode->addChild('rollno', $student['rollno']);
$studentNode->addChild('name', $student['name']);
$studentNode->addChild('address', $student['address']);
$studentNode->addChild('college', $student['college']);
$studentNode->addChild('course', $student['course']);
}
$xml->asXML('student.xml');
}
if (isset($_GET['course'])) {
$course = $_GET['course'];
$xml = simplexml_load_file('student.xml');
echo "<h2>Students in $course Course</h2>";
echo "<table border='1'><tr><th>Roll
No</th><th>Name</th><th>Address</th><th>College</th></tr>";
foreach ($xml->student as $student) {
if ((string)$student->course == $course) {
echo "<tr>
<td>{$student->rollno}</td>
<td>{$student->name}</td>
<td>{$student->address}</td>
<td>{$student->college}</td>
</tr>";
}
}
echo "</table>";
} else {
echo '<form method="get">
Enter course to filter: <input type="text" name="course" required>
<input type="submit" value="Filter">
</form>';
}
?>



import nltk
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
text = """Hello all, Welcome to Python Programming Academy. Hello all, Welcome to
Python Programming Academy. Hello all, Welcome to Python Programming
Academy. Hello all, Welcome to Python Programming Academy. Hello all, Welcome
to Python Programming Academy. Hello all, Welcome to Python Programming
Academy. Python Programming Academy is a nice platform to learn new
programming skills. It is difficult to get enrolled in this Academy."""
nltk.download('stopwords')
nltk.download('punkt')
words = word_tokenize(text)
stop_words = set(stopwords.words('english'))
filtered_words = [word for word in words if word.lower() not in stop_words]
filtered_text = ' '.join(filtered_words)
print("Original Text:\n", text)
print("\nText after removing stopwords:\n", filtered_text)
