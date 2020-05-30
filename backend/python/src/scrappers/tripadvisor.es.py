from bs4 import BeautifulSoup
from seleniumwire import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from selenium.common.exceptions import TimeoutException
from selenium.webdriver.chrome.options import Options  
from chromedriver_py import binary_path
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

def wait_requests(driver):
	for request in driver.requests:
		if request.response and request.response.headers['Content-Type'] == 'application/json' and request.path == 'https://www.tripadvisor.es/data/graphql/batched':
			return True
	return False

def get_info(link):
	reviews = []
	options = 1
	driver = 1
	try:
		options = webdriver.ChromeOptions()
		options.add_argument('--ignore-certificate-errors')
		options.add_argument('--incognito')
		options.add_argument('--headless')
		driver = webdriver.Chrome(executable_path=binary_path, chrome_options=options)
		driver.get(link)
		wait = WebDriverWait(driver,120)
		wait.until(wait_requests)
	except TimeoutException:
		print("Failed to load search bar at www.google.com")
	except Exception as e:
		print(e)
	finally:
		for request in driver.requests:
			if request.response and request.response.headers['Content-Type'] == 'application/json' and request.path == 'https://www.tripadvisor.es/data/graphql/batched':
				response = json.loads(request.response.body)

				for r in response:
					if 'locations' in r['data']:
						try:
							for location in r['data']['locations']:
								if 'reviewListPage' in location:
									for review in location['reviewListPage']['reviews']:
										r = Review(review['id'], review['userId'], review['title'], review['text'], review['language'])
										reviews.append(r)
						except Exception as e:
							""
		driver.quit()
	return reviews

if __name__ == "__main__":
	parser = argparse.ArgumentParser()
	parser.add_argument('--url', type=str)
	args = parser.parse_args()
	reviews = get_info(args.url)
	
	print(json.dumps(
		reviews,
		default=lambda o: o.__dict__, sort_keys=True, indent=4
	))