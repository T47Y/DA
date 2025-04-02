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


import pandas as pd
import re
from textblob import TextBlob
data = pd.read_csv('CSV/covid_2021_1.csv')
# Drop rows with missing 'comment_text'
data = data.dropna(subset=['comment_text'])
# Clean the comments
data['clean_comment'] = data['comment_text'].apply(lambda x: re.sub(r'[^a-zA-Z\s]', '',str(x)))
data['clean_comment'] = data['clean_comment'].apply(lambda x: re.sub(r'\s+', ' ', str(x)))
# Fixed to replace multiple spaces with one
data['tokenized_comment'] = data['clean_comment'].apply(lambda x: x.split())
# Initialize counters for sentiment
positive_comments = 0
negative_comments = 0
neutral_comments = 0
# Analyze sentiment
for comment in data['clean_comment']:
analysis = TextBlob(comment)
if analysis.sentiment.polarity > 0:
positive_comments += 1
elif analysis.sentiment.polarity < 0:
negative_comments += 1
else:
neutral_comments += 1
# Calculate the total number of comments
total_comments = len(data)
# Calculate percentages
ps_per = (positive_comments / total_comments) * 100
neg_per = (negative_comments / total_comments) * 100
neut_per = (neutral_comments / total_comments) * 100
# Print results
print("Percentage of positive comments: ", format(ps_per, '.2f'))
print("Percentage of negative comments: ", format(neg_per, '.2f'))
print("Percentage of neutral comments: ", format(neut_per, '.2f'))
