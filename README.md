# Installation Api
## SSL Zertifikate
```bash
openssl req -x509 -out nginx/ssl/localhost.crt -keyout nginx/ssl/localhost.key \
  -newkey rsa:2048 -nodes -sha256 \
  -subj '/CN=localhost' -extensions EXT -config <( \
   printf "[dn]\nCN=localhost\n[req]\ndistinguished_name = dn\n[EXT]\nsubjectAltName=DNS:localhost\nkeyUsage=digitalSignature\nextendedKeyUsage=serverAuth")
```

## Running
```bash
./run.sh
```


## Symfony

### Composer install
Bei der ersten Verwendung Composer installieren
```bash
docker compose run --rm composer install
```
Später einfach updaten
```bash
docker compose run --rm composer update
```

```bash
docker compose run --rm composer create-project symfony/skeleton:"7.0.*" .
```
