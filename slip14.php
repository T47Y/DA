<!DOCTYPE html>
<html>
<head>
<title>Login Form Validation</title>
<script>
function validateForm() {
const username = document.getElementById("username").value;
const password = document.getElementById("password").value;
if (username === "" || password === "") {
alert("Both username and password are required!");
return false;
}
if (username.length < 4) {
alert("Username must be at least 4 characters long");
return false;
}
if (password.length < 6) {
alert("Password must be at least 6 characters long");
return false;
}
alert("Login successful!");
return true;
}
</script>
</head>
<body>
<h1>Login Form</h1>
<form onsubmit="return validateForm()">
Username: <input type="text" id="username" required><br>
Password: <input type="password" id="password" required><br>
<input type="submit" value="Login">
</form>
</body>
</html>


import pandas as pd
import nltk
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
from nltk.stem import WordNetLemmatizer
from wordcloud import WordCloud
import matplotlib.pyplot as plt
nltk.download('wordnet')
df = pd.read_csv('CSV/movie_review.csv')
stop_words = set(stopwords.words('english'))
lemmatizer = WordNetLemmatizer()
def preprocess_text(text):
words = word_tokenize(text)
words = [word.lower() for word in words if word.isalpha()]
words = [lemmatizer.lemmatize(word) for word in words if word not in stop_words]
return ' '.join(words)
df['clean_text'] = df['text'].apply(preprocess_text)
all_text = ' '.join(df['clean_text'])
wordcloud = WordCloud(width=800, height=400,
background_color='white').generate(all_text)
plt.figure(figsize=(10, 6))
plt.imshow(wordcloud, interpolation='bilinear')
plt.axis('off')
plt.title('Word Cloud of Movie Reviews')
plt.show()
