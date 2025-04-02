<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>
<script>
window.onload = function() {
alert("Hello Good Morning!");
};
function validateForm() {
const name = document.getElementById("name").value;
const email = document.getElementById("email").value;
if (name.trim() === "" || email.trim() === "") {
alert("Please fill in all fields");
return false;
}
alert("Registration successful!");
return true;
}
</script>
</head>
<body>
<h1>Student Registration Form</h1>
<form onsubmit="return validateForm()">
Name: <input type="text" id="name" required><br>
Email: <input type="email" id="email" required><br>
Course:
<select id="course">
<option value="cs">Computer Science</option>
<option value="it">Information Technology</option>
<option value="ece">Electronics</option>
</select><br>
<input type="submit" value="Register">
</form>
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
