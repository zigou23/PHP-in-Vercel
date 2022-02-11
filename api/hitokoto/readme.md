# PHP api 人生语录

### 接口地址

https: //`your-domain`/hitokoto/index.php?*type*=hitokoto.txt&*encode*=js

`your-domain`: 

  - ~~https://zigou-api.herokuapp.com  heroku服务器，部分运营商无法访问~~弃用，太慢
  - https://php-zi.vercel.app  vercel服务器，部分运营商无法访问
  - https://api.qsim.top 自己的

| 属性         | 解释                                           | 返回值                                                       |
| ------------ | ---------------------------------------------- | ------------------------------------------------------------ |
| `type`       | 指定文本库文件名，无参数时默认为'hitokoto.txt' | `内容`                                                        |
| `encode=js`  | 赋值为'js'时返回js代码，否则返回文本           | function zigouapi1(){document.write('`内容`');}              |
| `encode=js2` | 赋值为'js2'时返回js代码，否则返回文本          | (function zigouapi1(){var zigouapi1='`内容`';var dom=document.querySelector('#zigouapi1');Array.isArray(dom)?dom[0].innerText=zigouapi1:dom.innerText=zigouapi1;})() |

### html接入

1. encode=js api页面加载过慢会引起整个网页变慢
```html
<script type="text/javascript" src="https://`your-domain`/hitokoto/index.php?encode=js"></script>
<p class="content"><script>zigouapi1()</script></p>
```
2. encode=js2 api加载不影响页面
```html
<span id="zigouapi1">:D 语录获取中...</span>
<script src="https://`your-domain`/hitokoto/index.php?encode=js2" defer></script>
```



> 注：我的网站由无服务器构成，所以均较慢

本页 `api` 参考[来源](https://blog.imvann.com/6.html) 部分语录参考自[名言通](https://www.mingyantong.com/)

