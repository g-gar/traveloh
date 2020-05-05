from bs4 import BeautifulSoup
from seleniumwire import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.chrome.options import Options  
import urllib.request
import json
import argparse
import time

class Review():
	def __init__(self, reviewId, userId, title, text, language):
		self.reviewId = reviewId
		self.userId = userId
		self.title = title
		self.text = text
		self.language = language

def get_info(link):
	reviews = []
	try:
		browser = webdriver.Chrome(ChromeDriverManager().install())
		browser.get(link)
		wait = WebDriverWait(browser,10)
		wait.until(EC.presence_of_element_located((By.CLASS_NAME, 'location-review-review-list-parts-ExpandableReview__reviewText--gOmRC')))

		for request in browser.requests:
			if request.response and request.response.headers['Content-Type'] == 'application/json' and request.path == 'https://www.tripadvisor.es/data/graphql/batched':
				print(
					request.path,
					request.response.headers['Content-Type']
				)
				response = json.loads(request.response.body)

				for i in response:
					if 'data' in i:
						if 'locations' in i['data']:
							for location in i['data']['locations']:
								if 'reviewListPage' in location:
									for review in location['reviewListPage']['reviews']:
										print(review['id'], review['userId'], review['title'], review['text'], review['language'])
										r = Review(review['id'], review['userId'], review['title'], review['text'], review['language'])
										reviews.append(r)

	except TimeoutException:
		print("Failed to load search bar at www.google.com")
	except Exception as e:
		print(e)
	finally:
		browser.quit()
		return reviews

if __name__ == "__main__":
	parser = argparse.ArgumentParser()
	parser.add_argument('--url', type=str)
	args = parser.parse_args()
	reviews = get_info(args.url)
	
	print(json.dumps(
		{
			'reviews': reviews
		},
		default=lambda o: o.__dict__, sort_keys=True, indent=4
	))