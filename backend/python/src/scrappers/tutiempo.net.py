import requests
from bs4 import BeautifulSoup
import csv
import json
import argparse
import urllib.request
from json import JSONEncoder
import re

class Result():
    def __init__(self, hour, weather, temperature, wind, humidity, atmospheric_pressure):
        self.hour = hour
        self.weather = weather
        self.temperature = temperature
        self.wind = wind
        self.humidity = humidity
        self.atmospheric_pressure = atmospheric_pressure

def toInt(str):
    s = re.sub('[\\D]', '',str)
    return int(s) if s else 0

def scrape(url):
    page = requests.get(url)
    soup = BeautifulSoup(page.content, 'html.parser')

    cuerpoClima = soup.find("div", class_="last24")
    table = cuerpoClima.find_next("tbody")

    lista=[]
    for row in table.find_all('tr'):
        i = [ele.text.strip() for ele in row.findChildren("td", recursive=False)]
        if len(i) == 6:
            lista.append( Result( i[0], i[1], toInt(i[2]), toInt(i[3]), float(toInt(i[4])) * 0.01, toInt(i[5]) ))
    return lista

if __name__ == "__main__":
    parser = argparse.ArgumentParser()
    parser.add_argument('--url', type=str)
    args = parser.parse_args()
    results = scrape(args.url)
    print(json.dumps(
        {
            'reviews': results
        },
        default=lambda o: o.__dict__, sort_keys=True, indent=4
    ))