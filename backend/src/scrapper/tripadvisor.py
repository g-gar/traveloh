from bs4 import BeautifulSoup
import urllib.request
import json
import argparse

class Review():
   def __init__(self, quote, summary):
      self.quote = quote
      self.summary = summary

def get_info(link):
    response = urllib.request.urlopen(link)
    soup = BeautifulSoup(response.read(),'html.parser')

    reviews = []
    for review in soup.find(id='REVIEWS').find_all(class_='review-container'):
      quote = review.find(class_='quote').find('a', class_='title').get_text(strip=True)
      summary = review.find(class_='prw_reviews_text_summary_hsx').find('p', class_='partial_entry').get_text(strip=True)
      reviews.append(Review(quote, summary))
    return reviews

parser = argparse.ArgumentParser()
parser.add_argument('--url', type=str)
args = parser.parse_args()

reviews = get_info(args.url)
print(reviews)