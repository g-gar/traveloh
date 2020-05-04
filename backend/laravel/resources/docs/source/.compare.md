---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_8083313c751d95465d77ff7eb2622cc7 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/aeropuertos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/aeropuertos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET aeropuertos`


<!-- END_8083313c751d95465d77ff7eb2622cc7 -->

<!-- START_3aee4b764557a782394aabe8429d4054 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/aeropuertos/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/aeropuertos/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET aeropuertos/create`


<!-- END_3aee4b764557a782394aabe8429d4054 -->

<!-- START_f867a2c4c8efbc845950051df466d4be -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/aeropuertos" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/aeropuertos"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST aeropuertos`


<!-- END_f867a2c4c8efbc845950051df466d4be -->

<!-- START_be8b9a4eb665dd124d3451117c219a5e -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/aeropuertos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/aeropuertos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET aeropuertos/{aeropuerto}`


<!-- END_be8b9a4eb665dd124d3451117c219a5e -->

<!-- START_2b8f39699a2e6d12badc95a7d9028835 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/aeropuertos/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/aeropuertos/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET aeropuertos/{aeropuerto}/edit`


<!-- END_2b8f39699a2e6d12badc95a7d9028835 -->

<!-- START_5ce8eb62baf2dc83c9bd08079515f5fb -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/aeropuertos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/aeropuertos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT aeropuertos/{aeropuerto}`

`PATCH aeropuertos/{aeropuerto}`


<!-- END_5ce8eb62baf2dc83c9bd08079515f5fb -->

<!-- START_019e079172e12c6808a65aac1a00b3ad -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/aeropuertos/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/aeropuertos/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE aeropuertos/{aeropuerto}`


<!-- END_019e079172e12c6808a65aac1a00b3ad -->

#variosmetodos management


APIs for managing variosmetodos
<!-- START_885ff84d223b7ed6ff12822049c2da6a -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/varios" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/varios"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET varios`


<!-- END_885ff84d223b7ed6ff12822049c2da6a -->

<!-- START_793744697ae1e70144f56d42ac79d2dc -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/varios/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/varios/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET varios/create`


<!-- END_793744697ae1e70144f56d42ac79d2dc -->

<!-- START_0c6b35cecbb840687869940538dde8ca -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/varios" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/varios"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST varios`


<!-- END_0c6b35cecbb840687869940538dde8ca -->

<!-- START_c3c0a367f740fa22c92c6b1914ac478a -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/varios/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/varios/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET varios/{vario}`


<!-- END_c3c0a367f740fa22c92c6b1914ac478a -->

<!-- START_cdb0113bddae42872ef7d199f36b6138 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/varios/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/varios/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET varios/{vario}/edit`


<!-- END_cdb0113bddae42872ef7d199f36b6138 -->

<!-- START_d92b34f3e06a1b23e5ab7f3cec1520b4 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/varios/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/varios/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT varios/{vario}`

`PATCH varios/{vario}`


<!-- END_d92b34f3e06a1b23e5ab7f3cec1520b4 -->

<!-- START_1ac89ecd00f20e5418a0fcac9eb4ab6e -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/varios/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/varios/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE varios/{vario}`


<!-- END_1ac89ecd00f20e5418a0fcac9eb4ab6e -->


