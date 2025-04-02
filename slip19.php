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



import pandas as pd
import matplotlib.pyplot as plt
file_path = 'CSV/INvideos.csv' # Modify this if your file is in a different folder
try:
data = pd.read_csv(file_path)
except FileNotFoundError:
print(f"Error: The file '{file_path}' was not found. Please check the path and try
again.")
exit()
data.dropna(inplace=True)
total_views = data['views'].sum()
total_likes = data['likes'].sum()
total_dislikes = data['dislikes'].sum()
total_comments = data['comment_count'].sum()
print("Total Views:", total_views)
print("Total Likes:", total_likes)
print("Total Dislikes:", total_dislikes)
print("Total Comments:", total_comments)
least_liked_video = data.loc[data['likes'].idxmin()]
top_liked_video = data.loc[data['likes'].idxmax()]
least_commented_video = data.loc[data['comment_count'].idxmin()]
top_commented_video = data.loc[data['comment_count'].idxmax()]
print("\nLeast Liked Video:", least_liked_video)
print("Top Liked Video:", top_liked_video)
print("Least Commented Video:", least_commented_video)
print("Top Commented Video:", top_commented_video)
plt.scatter(data['views'], data['likes'], color='blue', alpha=0.5)
plt.title('Views vs Likes')
plt.xlabel('Views')
plt.ylabel('Likes')
plt.show()
