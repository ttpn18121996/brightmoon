## Tạo file .env

```bash
cp .env.example .env
```

## Khởi động

Chạy docker

```bash
bash start_docker.sh
```

Chạy các lệnh

```bash
docker-compose exec web composer install
```

Mở trình duyệt truy cập đường dẫn [localhost](http://localhost)

Sử dụng domain ảo

Thêm domain vào hosts

```bash
sudo vim /etc/hosts
```

Thêm dòng `127.0.0.1    brightmoon.test` và lưu lại `:wq`

Có thể thay đổi tên miền tuỳ ý trong `docker/web/apache/default.apache.conf` ở dòng **ServerName** thay `brightmoon.test` thành tên miền tuỳ thích sau đó lưu lại. Thêm tên miền vào `/etc/hosts` và build lại.

Sau đó mở trình duyệt truy cập đường dẫn với tên miền vừa tạo. Mặc định [brightmoon.test](http://brightmoon.test)
