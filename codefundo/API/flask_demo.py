from flask import Flask, request, jsonify
import requests
import http.client, urllib.request, urllib.parse, urllib.error, base64

app = Flask(__name__)



@app.route("/key-phrase",methods=['POST'])
def key_phrase():

	params = urllib.parse.urlencode({})
	headers = {
	# Request headers
	'Content-Type': 'application/json',
	'Ocp-Apim-Subscription-Key': '44fe709b503e421fbcbc8c33af1fcafb',
	}

	conn = http.client.HTTPSConnection('southeastasia.api.cognitive.microsoft.com')
	conn.request("POST", "/text/analytics/v2.0/keyPhrases?%s" % params, "{body}", headers)
	response = conn.getresponse()
	data = response.read()
	conn.close()
	return jsonify(data)

@app.route("/sentiment-analysis",methods=['POST'])
def sentiment_analysis():
	params = urllib.parse.urlencode({
		})

	headers = {
	# Request headers
	'Content-Type': 'application/json',
	'Ocp-Apim-Subscription-Key': '44fe709b503e421fbcbc8c33af1fcafb',
	}
	conn = http.client.HTTPSConnection('southeastasia.api.cognitive.microsoft.com')
	conn.request("POST", "/text/analytics/v2.0/sentiment?%s" % params, "{body}", headers)
	response = conn.getresponse()
	data = response.read()
	conn.close()
	return jsonify(data)


if (__name__ == "__main__"):
	app.run(host = "0.0.0.0",port = 5000)
