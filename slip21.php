<html>
<body>
<h1>Number Operations</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method=POST>
<p>
<label>Enter a number:</label>
<input type="text" name="t1">
</p>
<p>
Fibbonacci series <input type=radio name=r1 value=f> <br>
sum of digits <input type=radio name=r1 value=s><br>
<input type="submit" value="Calculate">
</p>
</form>
<?php
$ch=$_POST['r1'];
$number = $_POST["t1"];
if($ch=='f')
{
echo "<h2>Fibonacci Series:</h2>";
echo fibonacciSeries($number);
}
else if($ch=='s')
{
echo "<h2>Sum of Digits:</h2>";
echo sumOfDigits($number);
}
// Function to calculate the Fibonacci series
function fibonacciSeries($number)
{
$p=0;
$c=1;
$series = "0, 1";
for ($i = 2; $i < $number; $i++) {
$next = $p+$c;
$series .= ", $next";
$p = $c;
$c = $next;
}
return "<p>$series</p>";
}
// Function to calculate the sum of digits
function sumOfDigits($number) {
$sum = 0;
while ($number > 0) {
$digit = $number % 10;
$sum =$sum+ $digit;
$number = floor($number / 10);
}
return "<p>$sum</p>";
}
?>
</body>
</html>


import re
from nltk.tokenize import sent_tokenize
from nltk.corpus import stopwords
from nltk.stem import PorterStemmer
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
text = "So, keep working. Keep striving. Never give up. Fall down seven times, get up
eight. Ease is a greater threat to progress than hardship. Ease is a greater threat to
progress than hardship. So, keep moving, keep growing, keep learning. See you at work."
def preprocess_text(text):
text = re.sub(r'[^a-zA-Z\s]', '', text)
text = re.sub(r'\d+', '', text)
return text.lower()
def tokenize_sentences(text):
return sent_tokenize(text)
preprocessed_text = preprocess_text(text)
sentences = tokenize_sentences(preprocessed_text)
stop_words = set(stopwords.words("english"))
stemmer = PorterStemmer()
def preprocess_sentence(sentence):
words = sentence.split()
words = [stemmer.stem(word) for word in words if word not in stop_words]
return ' '.join(words)
preprocessed_sentences = [preprocess_sentence(sentence) for sentence in sentences]
vectorizer = TfidfVectorizer()
tfidf_matrix = vectorizer.fit_transform(preprocessed_sentences)
cosine_sim_matrix = cosine_similarity(tfidf_matrix, tfidf_matrix)
sentence_scores = cosine_sim_matrix.sum(axis=1)
sorted_indices = sentence_scores.argsort()[::-1]
num_sentences_summary = 2
summary_sentences = [sentences[idx] for idx in
sorted_indices[:num_sentences_summary]]
summary = ' '.join(summary_sentences)
print("Original Text:\n", text)
print("\nExtractive Summary:\n", summary)
