from twitterscraper import *
import datetime as dt
import argparse
import json
import pandas as pd

def scrape(text):
	tweets = query_tweets(text, 10)
	for tweet in tweets:
		print(tweet)
		
	df = pd.read_json('tweets.json', encoding='utf-8')
	return df

if __name__ == "__main__":
	parser = argparse.ArgumentParser()
	parser.add_argument('--text', type=str)
	args = parser.parse_args()

	results = scrape(args.text)
	print(json.dumps(
		results,
		default=lambda o: o.__dict__, sort_keys=True, indent=4
	))
