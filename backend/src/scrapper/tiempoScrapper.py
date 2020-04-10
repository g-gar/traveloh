import requests
from bs4 import BeautifulSoup
import csv

page = requests.get("https://www.tutiempo.net/madrid-barajas.html?datos=ultimas-24-horas")
soup = BeautifulSoup(page.content, 'html.parser')

cuerpoClima = soup.find("div", class_="last24")
table = cuerpoClima.find_next("tbody")
info = table.find_all("td")
lista=[]
for i in info:
  lista.append(i.get_text())
for a in lista:
  print(a)


with open('output.csv', 'w', newline='') as csvfile:
    writer = csv.writer(csvfile)
    for i in range(0,len(lista),6):
        writer.writerow(lista[i:i+6])

