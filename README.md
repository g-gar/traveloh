# traveloh
## Requirements
* Python > 3.0.0
* nodejs & npm
## Installation & configuration
### Backend
```cmd
virtualenv -p python backend
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
```cmd
npm install
ng serve --open
```
