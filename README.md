# mot-alexa-server
Alexa API for an experimental skill, that would add defects to MOT test.
Check out MOT repo here https://github.com/dvsa/mot
It uses https://github.com/MayBeTall/Alexa-PHP-Endpoint library only. It's a shame it's not composer-ready.

# Setup
1. Run it on localhost
```php -S 0.0.0.0:8080 -t ./```
2. Use ngrok to expose it to the internet
```./ngrok http 8080```
3. Set Alexa endpoint URL 
```https://replace_random_ngrok_id.ngrok.io/app.php```


# Demo
[![Adding defects to MOT test usign Alexa](https://img.youtube.com/vi/lXkGt7zGKwE/0.jpg)](https://www.youtube.com/watch?v=lXkGt7zGKwE)