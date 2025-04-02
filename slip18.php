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


import re
text = "hello 1234 this is @"
def preprocess_text(text):
text = re.sub(r'[^a-zA-Z\s]', '', text)
text = re.sub(r'\d+', '', text)
return text.lower()
preprocessed_text = preprocess_text(text)
print("Original Text:\n", text)
print("\nAfter processing text:\n", preprocessed_text)
