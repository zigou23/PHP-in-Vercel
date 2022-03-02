<div align="right">
  语言:
  中文 /
  <a title="English" href="#">US</a>
</div>
<div align="center">
  <h1><a href="https://github.com/zigou23/PHP-in-Vercel" target="_blank">PHP-in-Vercel</a></h1>
  <div align="center">
  </div>
  <p>一个<del>轻量、无后端</del>的PHP模块，<del>随便瞎编点，主要它美观嘛</del><br>注：vercel限制免费用户12 Serverless Functions, 也就是12个PHP File</p>

[![commit-activity](https://img.shields.io/github/commit-activity/m/zigou23/PHP-in-Vercel)](https://github.com/zigou23/PHP-in-Vercel)
[![vercel](https://badgen.net/badge/icon/vercel?icon=vercel&label)](https://php-zi.vercel.app/)
[![website](https://img.shields.io/website?url=https%3A%2F%2Fphp-zi.vercel.app)]()
[![GPL3.0 License](https://img.shields.io/github/license/zigou23/PHP-in-Vercel?color=FF5531)](https://github.com/zigou23/PHP-in-Vercel/blob/master/LICENSE)


[📘文档](https://github.com/zigou23/PHP-in-Vercel/#api%E6%8E%A5%E5%8F%A3) |
[🤔报告问题](https://github.com/zigou23/PHP-in-Vercel/issues/new/)
<!-- [🛠️安装](https://mmrotate.readthedocs.io/en/latest/install.html) |
[👀模型库](docs/en/model_zoo.md) | -->
</div>

## 使用说明
This repository use with @juicyfx/vercel-examples

Because building serverless functions has [12 limits](https://vercel.com/docs/concepts/limits/overview#general-limits) , only for long-term archiving.

> Build Failed
>
> No more than 12 Serverless Functions can be added to a Deployment on the Hobby plan. Create a team (Pro plan) to deploy more.

> Tips: This is a private learning warehouse.

## API接口

1. 自己的语录接口：`https://php-zi.vercel.app/api/hitokoto/index.php`

- [参数](/api/hitokoto/readme.md)

2. Bing每日一图：

- 302跳转 `https://php-zi.vercel.app/api/bingimg/index.php`
  - 8张随机图 ?random=1
  - 指定图 ?value=(1-7) (注：默认value=0(~~知道有bug~~)
  - 走服务器 ?server=1 (Notice:不建议使用

3. user 
- 由于vercel仅支持ipv4 所以暂时无法获取ipv6 `https://php-zi.vercel.app/api/user/index.php`
- `index.php`替换成`ip.php`&`ipinfo.php` (正在建设..)

## web

`your-domain`: 

  - https://php-zi.vercel.app vercel服务器
  - https://api.qsim.top 自己的



> 注：我的网站由无服务器构成，所以均较慢 如果hitokoto.txt里有不好的语句，欢迎[联系我](https://www.qsim.top)

`由于本人未学习PHP,内容均为网络,如有问题,plz tell me`
