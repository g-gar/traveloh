import requests
from bs4 import BeautifulSoup
import csv
import json
import argparse
import urllib.request
from json import JSONEncoder
import re

class Result():
    def __init__(self, hour, idVuelo, destino, aerolinea, terminal):
        self.hour = hour
        self.idvuelo = weather
        self.destino = temperature
        self.aerolinea = wind
        self.terminal = humidity
        self.aeropuerto = aeropuerto



def scrape(url):
    page = requests.get("url")
    soup = BeautifulSoup(page.content, 'html.parser')
    #Buscamos las etiquetas que nos interesan
    info = soup.find('div', {'id':'flightResults'}).findAll('tr', {'class':'principal'})
    lista = []
    for i in info:
        #Creamos una lista para guardar cada valor de informacion
        #Buscamos el valor de la hora para sacar el texto posteriormente
        hora = i.find('td', {'class':'col1'})
        hora = hora.text
        #Guardamos el valor de la h en la lista[]
        idVuelo = i.find('td', {'class':'col2'})
        idVuelo = idVuelo.text

        destino = i.find('td', {'class':'col3'})
        destino = destino.text

        aerolinea = i.find('td', {'class':'col4'})
        aerolinea = aerolinea.text

        terminal = i.find('td', {'class':'col5'})
        #Hay en algunos vuelos en los que no especifica la terminal 
        if terminal != None:
            terminal = terminal.text
        lista.append(Result( hora, idVuelo, destino, aerolinea, terminal ))
    return lista

if __name__ == "__main__":
    parser = argparse.ArgumentParser()
    parser.add_argument('--url', type=str)
    args = parser.parse_args()
    results = scrape(args.url)
    print(json.dumps(
        {
            'results': results
        },
        default=lambda o: o.__dict__, sort_keys=True, indent=4
    ))