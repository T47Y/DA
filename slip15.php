<?xml version="1.0" encoding="UTF-8"?>
<students>
<student>
<id>101</id>
<name>John Smith</name>
<age>21</age>
<course>Computer Science</course>
<grade>A</grade>
</student>
<student>
<id>102</id>
<name>Emily Johnson</name>
<age>20</age>
<course>Information Technology</course>
<grade>B+</grade>
</student>
<student>
<id>103</id>
<name>Michael Brown</name>
<age>22</age>
<course>Electronics</course>
<grade>A-</grade>
</student>
<student>
<id>104</id>
<name>Sarah Davis</name>
<age>21</age>
<course>Mechanical Engineering</course>
<grade>B</grade>
</student>
<student>
<id>105</id>
<name>David Wilson</name>
<age>20</age>
<course>Computer Science</course>
<grade>A</grade>
</student>
</students>


import nltk
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
text = """Hello all, Welcome to Python Programming Academy. Python Programming
Academy is a nice platform to learn new programming skills. It is difficult to get enrolled
in this Academy."""
nltk.download('stopwords')
nltk.download('punkt')
words = word_tokenize(text)
stop_words = set(stopwords.words('english'))
filtered_words = [word for word in words if word.lower() not in stop_words]
filtered_text = ' '.join(filtered_words)
print("Original Text:\n", text)
print("\nText after removing stopwords:\n", filtered_text)
