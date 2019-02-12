
## Q&A
### 遇到 `TypeError: Cannot read property 'show_ui' of undefined`

```nginx
location / {
        try_files $uri $uri/ /index.php$is_args$args;
    }
```