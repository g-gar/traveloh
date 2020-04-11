from bs4 import BeautifulSoup
from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
import urllib.request
import json
import argparse
import time

class Review():
   def __init__(self, quote, summary):
      self.quote = quote
      self.summary = summary

def get_info(link):
    browser = webdriver.Chrome(ChromeDriverManager().install())
    browser.get(link)
    time.sleep(5)
    for span in browser.find_elements_by_class_name('location-review-review-list-parts-ExpandableReview__ctaLine--24Qlb'):
        span.click()

    soup = BeautifulSoup(browser.page_source, 'html.parser')

    reviews = []
    a = soup.find_all(True, attrs={'class': 'location-review-review-list-parts-ExpandableReview__reviewText--gOmRC'})
    for container in a:
        for span in container.find_all('span'):
            print(span.getText())
    browser.close()
    return reviews

parser = argparse.ArgumentParser()
parser.add_argument('--url', type=str)
args = parser.parse_args()

reviews = get_info(args.url)
print(reviews)