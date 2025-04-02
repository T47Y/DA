<?php
$xml = simplexml_load_file("book.xml");
if ($xml === false) {
echo "Failed to load XML file";
exit;
}
echo "<h2>Book Details</h2>";
echo "<table
border='1'><tr><th>ID</th><th>Title</th><th>Author</th><th>Price</th></tr>";
foreach ($xml->book as $book) {
echo "<tr>";
echo "<td>".$book['id']."</td>";
echo "<td>".$book->title."</td>";
echo "<td>".$book->author."</td>";
echo "<td>".$book->price."</td>";
echo "</tr>";
}
echo "</table>";
?>

<!-- Page 2 name- book.xml -->
<books>
<book id="1">
<title>PHP Basics</title>
<author>John Doe</author>
<price>500</price>
</book>
</books>



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
