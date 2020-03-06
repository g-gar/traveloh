export const environment = {
  production: true,
  sentimentApi: {
    baseUrl: 'http://localhost:5000',
    variants: ['analyzer'],
    types: ['vader', 'textblob']
  }
};
