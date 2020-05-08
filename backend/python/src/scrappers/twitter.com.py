
# -*- coding: utf-8 -*-
"""
Created on Thu Mar 26 20:36:30 2020

@author: manu1
"""
from twitterscraper import query_tweets
import datetime as dt
import pandas as pd
##import sys

##print 'Numero de Parametros: ', len(sys.argv)
##print 'Lista Argumentos: ', str(sys.argv)



begin_date = dt.date(2020,3,15)
end_date = dt.date(2020,3,16)
limit = 500
lang = 'spanish'

tweets = query_tweets('coronavirus', begindate = begin_date, enddate = end_date, limit = limit, lang = lang)
df = pd.DataFrame(t.__dict__ for t in tweets)
print(df.text)
""" https://twitter.com/search?q=coronavirus&src=typed_query
https://twitter.com/search?q=espa%C3%B1a&src=typed_query
 
