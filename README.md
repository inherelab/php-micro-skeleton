# php micro skeleton

[![License](https://img.shields.io/packagist/l/inhere/console.svg?style=flat-square)](LICENSE-2.0.txt)
[![Latest Stable Version](http://img.shields.io/packagist/v/inhere/console.svg)](https://packagist.org/packages/inhere/console)

## mongodb support 

- before require install `ext-mongodb`

```text
composer require mongodb/mongodb
```

## 相关项目

- `swagger-php` 用于生成 swagger.json 文档。
- `swagger-ui` api 文档展示
- `codeception` 测试框架(已经包含了 phpunit)

### 数据存储

- mysql
- mongodb
- redis
- memcache

## 一、应用

### WEB 应用

- 入口文件 `web/index.php`
- web控制器默认放在 `app/Controllers` 目录

### CLI 应用

- 入口文件 `bin/console`
- 命令行控制器放在 `app/Console` 目录

执行：`php bin/console` 查看更多信息

### nginx 配置

在 `resources/server-configs`

### 问题

## 二、 swagger-php 

推荐全局安装：

```sh
composer require --global zircote/swagger-php
```

使用

```bash
vendor/bin/swagger --output web/docs
```

## 三、 swagger 文档

### swagger 

swagger 2.0 定义 https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md

- 数据类型参考 https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#data-types

swagger-ui 下载

- `npm install swagger-ui-dist`
- 或者 https://github.com/swagger-api/swagger-ui

拷贝 `dist` 下的所有文件到项目目录下 `swagger-ui` 目录

### 文档生成

```sh
// 扫描当前文件夹下所有目录
vendor/bin/swagger --output web/docs
// 指定扫描一个或多个目录
vendor/bin/swagger --output web/docs [dirs ...]
```

### 文档查看

- 运行服务器(只能在内网查看)

```
./bin/dev-server
```

- 访问： `127.0.0.1:8066`

## 四、 codeception 测试

codeception:

- 官网 http://codeception.com
- github https://github.com/codeception/codeception
- phalcon 配置demo https://github.com/Codeception/phalcon-demo

分为三类：

- acceptance 验收测试
- functional 功能测试
- unit 单元测试

### 初始化

将会创建基本的目录和配置文件

```bash
codecept bootstrap
```

### 运行测试

运行流程：

```text
tests/_boot.php -> {suite}/_boot.php -> boot/web.php
```

```bash
codecept run --steps [--no-ansi]
```

php5 

```bash
php5 $(which codecept5.phar) run --steps [--no-ansi -vvv]
// 只运行单元测试
php5 $(which codecept5.phar) run unit
```

## MongoDb

phalcon 自带了操作类，不过是基于扩展 `mongo` (不再维护了)

若需要用较新的驱动，可以安装扩展 `mongodb`. 再安装php库 `mongodb/mongodb` 辅助使用。

```bash
composer require mongodb/mongodb
```

## License

MIT
