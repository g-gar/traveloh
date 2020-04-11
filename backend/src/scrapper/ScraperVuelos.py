import requests
from bs4 import BeautifulSoup
import csv

page = requests.get("http://www.aena.es/csee/Satellite/infovuelos/es/?origin_ac=MAD&mov=S")
soup = BeautifulSoup(page.content, 'html.parser')

info = soup.find('div', {'id':'flightResults'}).findAll('tr', {'class':'principal'})


lista = []

for i in info:

        hora = i.find('td', {'class':'col1'})
        hora = hora.text
        lista.append(hora)
        print(hora)

        idVuelo = i.find('td', {'class':'col2'})
        idVuelo = idVuelo.text
        lista.append(idVuelo)
        print(idVuelo)

        destino = i.find('td', {'class':'col3'})
        destino = destino.text
        lista.append(destino)
        print(destino)

        aerolinea = i.find('td', {'class':'col4'})
        aerolinea = aerolinea.text
        lista.append(aerolinea)
        print(aerolinea)

        terminal = i.find('td', {'class':'col5'})
        if terminal != None:
            terminal = terminal.text
            lista.append(terminal)
        
        

with open('outputVuelos.csv', 'w', newline='') as csvfile:
    writer = csv.writer(csvfile)
    #writer.writerow(['Hora', 'idVuelo', 'Destino', 'Aerolinea', 'Terminal'])
    for i in range(0,len(lista),5):
        writer.writerow(lista[i:i+5])    
    
