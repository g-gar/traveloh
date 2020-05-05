from flask import Flask, jsonify, request, abort, Response
from flask_cors import CORS, cross_origin
from textblob import TextBlob
from vaderSentiment.vaderSentiment import SentimentIntensityAnalyzer
from googletrans import Translator

app = Flask(__name__)

app.config['CORS_HEADERS'] = 'Content-Type'

@app.route('/analyze', methods=['POST'])
@cross_origin(origin='localhost',headers=['Content- Type'])
def analyze():

	print(request.json)

	if not request.json or not 'analyzer' in request.json or not 'lines' in request.json:
		abort(404)
	results = list()
	translator = Translator()
	for line in request.json['lines']:

		detection = translator.detect(line)
		if detection.lang != 'en':
			translation = translator.translate(line, dest='en')
			line = translation.text

		result = 0
		if request.json['analyzer'] == 'vader':
			analyzer = SentimentIntensityAnalyzer().polarity_scores(line)
			result = analyzer
		elif request.json['analyzer'] == 'textblob':
			analyzer = TextBlob(line)
			result = analyzer.sentiment.polarity
		results.append(result)

	response = jsonify( {'results': results} )
	response.headers.add('Content-Type', 'text/json')

	return response, 201

if __name__ == '__main__':
	app.run(debug = True)