# traveloh
## Installation & configuration
### Backend
```cmd
virtualenv -p python3 backend
cd backend

source bin/activate (on Unix)
Scripts\activate (on Windows)

pip install -r requirements.txt
```
--- 
Start the server by running
```python
python src/app.py
```

It runs by default on `http://localhost:5000` and requests are accepted under `http://localhost:5000/analyze`.


### Frontend
