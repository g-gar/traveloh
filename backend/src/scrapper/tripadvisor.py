from bs4 import BeautifulSoup
from seleniumwire import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.by import By
from selenium.common.exceptions import TimeoutException
import urllib.request
import json
import argparse
import time

class Review():
   def __init__(self, quote, summary):
      self.quote = quote
      self.summary = summary

def filterRequests(driver):
    a = filter(
        lambda request: request.response.headers['Content-Type'] == 'application/json',
        driver.requests
    )
    for request in a:
        print(request.path)
    return a

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
                    if i['data']:
                        if 'cachedFilters' in i['data']:
                            print(i)
                        
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
    print(reviews)