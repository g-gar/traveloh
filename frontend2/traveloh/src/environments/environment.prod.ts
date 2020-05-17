export const environment = {
  production: true,
  API: {
    protocol: 'http',
    host: '127.0.0.1',
    port: '8000',
    paths: {
      authentication: '/authenticate/',
      scrapper: '/execute/scrapper',
      sentiment: '/execute/sentiment/',
      info: {
        airport: '/info/airports/',
        airline: '/info/airlines/',
        flight: '/info/flights/'
      }
    }
  }
};

