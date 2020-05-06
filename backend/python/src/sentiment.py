from vaderSentiment.vaderSentiment import SentimentIntensityAnalyzer
from googletrans import Translator
import json
import argparse

def analyze(text):
	analyzer = SentimentIntensityAnalyzer()
	vs = analyzer.polarity_scores(text)

if __name__ == "__main__":
	parser = argparse.ArgumentParser()
	parser.add_argument('--text', type=str)
	args = parser.parse_args()
	reviews = analyze(translator.translate(args.text, dest='en'))

	print(json.dumps(
			{
				'polarity_scores': vs
			},
			default=lambda o: o.__dict__, sort_keys=True, indent=4
		))