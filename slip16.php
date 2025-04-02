<?php
// Create cricket.xml if it doesn't exist
if (!file_exists('cricket.xml')) {
$xml = new SimpleXMLElement('<CricketTeam></CricketTeam>');
// Add Australia team
$team = $xml->addChild('Team');
$team->addAttribute('country', 'Australia');
$team->addChild('player', 'David Warner');
$team->addChild('runs', '5000');
$team->addChild('wicket', '15');
$xml->asXML('cricket.xml');
}
// Add India team
$xml = simplexml_load_file('cricket.xml');
$team = $xml->addChild('Team');
$team->addAttribute('country', 'India');
$team->addChild('player', 'Virat Kohli');
$team->addChild('runs', '8000');
$team->addChild('wicket', '10');
$xml->asXML('cricket.xml');
echo "cricket.xml has been updated with India team details.";
?>


import re
import matplotlib.pyplot as plt
from wordcloud import WordCloud
from nltk.tokenize import word_tokenize, sent_tokenize
from nltk.corpus import stopwords
from collections import Counter
import nltk
nltk.download('punkt')
nltk.download('stopwords')
text = """Hello world this is 4 and Here to summarize text"""
stop_words = set(stopwords.words('english'))
filtered_text = ' '.join([word for word in re.findall(r'\b\w+\b', text.lower()) if word not in
stop_words])
words = word_tokenize(filtered_text)
sentences = sent_tokenize(text)
word_freq = Counter(words)
plt.figure(figsize=(10, 6))
plt.bar(word_freq.keys(), word_freq.values())
plt.xlabel('Words')
plt.ylabel('Frequency')
plt.title('Word Frequency Distribution')
plt.xticks(rotation=45)
plt.show()
wordcloud = WordCloud(width=800, height=400,
background_color='white').generate(filtered_text)
plt.figure(figsize=(10, 6))
plt.imshow(wordcloud, interpolation='bilinear')
plt.axis('off')
plt.title('Word Cloud')
plt.show()
