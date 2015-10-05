## Vk downloader [WebApp Edition]

Веб приложение для скачивания файлов с сайта vk.com по ID файла. Приложение было созданно в виду того, что прямые ссылки 
которые генерирует vk по api запросу живут совсем не долго. Данное приложение делает api запрос к серверу vk для 
получения прямой ссылки - после чего отдает её пользователю.

### Сборка JS и CSS

```sh
npm install -g bower gulp 
npm update 
bower install 
gulp
```

### Настройка

Добавить в корень приложения файла .env

```
APP_DEBUG=false
APP_KEY=<рандомная строка>

VK_APP_ID=<ID приложения VK>
VK_APP_KEY=<ключ VK>
VK_APP_TOKEN=<токен VK>
```


### License

The Vk downloader licensed under the [MIT license](http://opensource.org/licenses/MIT)