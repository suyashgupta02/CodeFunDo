import requests
from pprint import pprint

subscription_key = "44fe709b503e421fbcbc8c33af1fcafb"
assert subscription_key
text_analytics_base_url = "https://southeastasia.api.cognitive.microsoft.com/text/analytics/v2.0/"

documents = {'documents' : [
  {'id': '1', 'language': 'en', 'text': 'I had a wonderful experience! The rooms were wonderful and the staff was helpful.'},
  {'id': '2', 'language': 'en', 'text': 'I had a terrible time at the hotel. The staff was rude and the food was awful.'}, 
]}

key_phrase_api_url = text_analytics_base_url + "keyPhrases"

headers   = {"Ocp-Apim-Subscription-Key": subscription_key}
response  = requests.post(key_phrase_api_url, headers=headers, json=documents)
key_phrases = response.json()
pprint(key_phrases)



