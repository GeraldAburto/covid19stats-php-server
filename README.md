# COVID-19 Statistics PHP Server

Get current statistics about Covid-19 pandemic.

## Available endpoints
| Endpoint                     | Parameters         | Description                                                            |
|------------------------------|--------------------|------------------------------------------------------------------------|
| /api/stats?search={search}                  | search (optional)  | Get stats for all countries, optionally  you can search for a country. |
| /api/stats/country/{country} | country (required) | Get stats for a specific country.                                      |

## Instalation
### Prerequisites
* Make sure you have installed Apache server 2.4.*
* You will need to have installed PHP 7.4.*

```
$ git clone <this repo url>
$ cd covid19stats-php-server
```
Place the project folder on your ```htdocs``` folder.

# Troubleshooting
Notice that the server app has CORS Policy enabled, so for development the only allowed domain is http://localhost:3000, but you can change it if you need.
