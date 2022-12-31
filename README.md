## Tạo file .env

```bash
cp .env.example .env
```

Chạy docker

```bash
bash start_docker.sh
```

Chạy các lệnh

```bash
docker-compose exec workspace composer install
```
