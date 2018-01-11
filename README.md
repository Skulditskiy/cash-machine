## How to install
Update dependencies
```
composer update
```

Add new host to your hosts file like
```
127.0.0.1 local.cashmachine.com
```

Add nginx vhost and reload nginx

## Example CLI request
```
php src\Application\Console\cli.php cashMachine:withdraw 1450
```

## Example API request 
``` 
curl -X POST \
  http://local.cashmachine.com/cashMachine/withdraw \
  -H 'Cache-Control: no-cache' \
  -H 'Content-Type: application/json' \
  -d '{"amount": 10560}'
```
In case of invalid request API response with "400 Bad request" with basic description of problem

## Example API response
If you asked CashMachine for withdrawing of $580, then you expect to have:
```
{
    "10": 1,
    "20": 1,
    "50": 1,
    "100": 5
}
```
which means that you will receive 5x$100, 1x$50, 1x$20, 1x$10.

## UI demo

![app screen](https://habrastorage.org/webt/eb/j8/1q/ebj81qdnrxfrhvytczpudplqqb4.png)

Open http://local.cashmachine.com/ for taking look how API endpoint works with UI in React. 
No transpilers and npm/node/webpack needed, but JS part written using ES6, so please use modern browser.