## Tạo file .env

```bash
cp .env.example .env
```

## Bắt đầu

Vào file `.env` chỉnh sửa các thông tin cấu hình cho phù hợp

Chạy lệnh build cho lần đầu

```bash
bin/dockx up -d --build
```

Mở trình duyệt truy cập vào thử. Mặc định [localhost](http://localhost)

Link vào adminer mặc định [adminer](http://localhost:8084)

## Cấu hình shell alias

Thay vì mỗi lần thực thi lệnh phải gõ `bin/dockx` thì có thể cấu hình alias ngắn gọn hơn.

```bash
alias dockx='[ -f dockx ] && sh bin/dockx'

# hoặc

alias dkx='[ -f dockx ] && sh bin/dockx'
```

Để đảm bảo điều này luôn có sẵn (khi tắt shell mở lại không cần cấu hình lại),
ta chỉ cần mở file `~/.zshrc` hoặc `~/.bashrc` rồi thêm dòng code đó vào. Restart lại shell.

## Thông tin thêm

Document root của apache sẽ được dẫn đến thư mục `public` vì thế phải bỏ file php trong `public` mới được.

## Cài đặt composer

```bash
dockx composer install
```

Mở trình duyệt truy cập đường dẫn [localhost](http://localhost)

Sử dụng domain ảo

Thêm domain vào hosts

```bash
sudo vim /etc/hosts
```

Thêm dòng `127.0.0.1    brightmoon.test` và lưu lại `:wq`

Có thể thay đổi tên miền tuỳ ý trong `docker/apache/default.apache.conf` ở dòng **ServerName** thay `brightmoon.test` thành tên miền tuỳ thích sau đó lưu lại. Thêm tên miền vào `/etc/hosts` và build lại.

Sau đó mở trình duyệt truy cập đường dẫn với tên miền vừa tạo. Mặc định [brightmoon.test](http://brightmoon.test)
