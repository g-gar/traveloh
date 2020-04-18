import requests
from bs4 import BeautifulSoup
import csv

aeropuertosLista = ['MAD', 'BCN', 'TFN', 'PMI', 'SVQ', 'GRX', 'LPA', 'ACE', 'TFS', 'BIO']
for aeropuerto in aeropuertosLista:
    
    #Recogemos la pagina de la que queremos sacar informacion
    page = requests.get("http://www.aena.es/csee/Satellite/infovuelos/es/?origin_ac="+aeropuerto+"&mov=S")
    soup = BeautifulSoup(page.content, 'html.parser')
    #Buscamos las etiquetas que nos interesan
    info = soup.find('div', {'id':'flightResults'}).findAll('tr', {'class':'principal'})
    #Creamos una lista para guardar cada valor de informacion
    lista = []
    
    for i in info:
            #Buscamos el valor de la hora para sacar el texto posteriormente
            lista.append(aeropuerto)
            hora = i.find('td', {'class':'col1'})
            hora = hora.text
            #Guardamos el valor de la h en la lista[]
            lista.append(hora)
            #print(hora)

            idVuelo = i.find('td', {'class':'col2'})
            idVuelo = idVuelo.text
            lista.append(idVuelo)
            #print(idVuelo)

            destino = i.find('td', {'class':'col3'})
            destino = destino.text
            lista.append(destino)
            #print(destino)

            aerolinea = i.find('td', {'class':'col4'})
            aerolinea = aerolinea.text
            lista.append(aerolinea)
            #print(aerolinea)

            terminal = i.find('td', {'class':'col5'})
            #Hay en algunos vuelos en los que no especifica la terminal 
            if terminal != None:
                terminal = terminal.text
                lista.append(terminal)
                #print(terminal)
    print(aeropuerto)
    print(lista)
    print('#########################################')
    with open('outputVuelos.csv', 'w', newline='') as csvfile:
        writer = csv.writer(csvfile)
        #writer.writerow(['Aeropueto', 'Hora', 'idVuelo', 'Destino', 'Aerolinea', 'Terminal'])
        for i in range(0,len(lista),6):
            writer.writerow(lista[i:i+6])  
