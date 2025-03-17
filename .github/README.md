# Kirby View Mode

![Version](https://img.shields.io/badge/Version-1.0.0-blue.svg) ![License](https://img.shields.io/badge/License-MIT-green.svg) ![Kirby](https://img.shields.io/badge/Kirby-4+-f0c674.svg)

With this plugin for [Kirby CMS](http://getkirby.com) you can display pages in different view modes. If you like to know mor eabout this consept please check out [this article on my website](https://flokosiol.de/articles/kirby-content-representations-custom-view-modes).

## ⚙️ Requirements

+ Kirby CMS, Version **4+**

## 💰 Commercial Usage

This plugin is **free** but if you use it in a commercial project please consider to [make a donation](https://www.paypal.me/flokosiol).

## 🛠️ Installation

### Composer

It is recommended to install the plugin via Composer:

```bash
composer require flokosiol/viewmode
```

### Download

Alternatively you can download and extract this repository, rename the folder to `viewmode` and drop it into the plugins folder of your Kirby installation. You should end up with a folder structure like this:

```
site/plugins/viewmode/
```

### Git Submodule

If you prefer git submodules, this ist your command:

```bash
git submodule add https://github.com/flokosiol/kirby-viewmode.git site/plugins/viewmode
```

## 🧑‍💻 Usage

### 1. View Mode Templates

This plugin is based on [content representations](https://getkirby.com/docs/guide/templates/content-representations). If you want to add a view mode to one of your page types you need to add a template to your `templates` folder like you do for content representations:

```
site/templates/mypagetype.myviewmode.php
```

The dafault template for the page type should already exists next to it.

```
site/templates/mypagetype.php
```

Inside your view mode template you can add the template code you want to use for the page when it's rendered in this particular view mode – just like you do in a normale page template or a snippet.

Like every other content representation you can make use of [controllers](https://getkirby.com/docs/guide/templates/content-representations#representation-controllers) to simplify your template code.

### 2. Using the view mode

To render a page in the declared view mode add this to your template code …

```php
<?= $page->viewMode('myviewmode') ?>
```

### 3. Route Blocking (optional)

The view modes (a.k.a. content representations) are by design accessible via their URL. This is intended! Otherwise content representions wouldn't make any sense. But since we use it for a different purpose, we might want to block these pages. If the regular page e.g. is `https://mydomain.com/articles/my-latest-article` a view mode `teaser` would be accessible via `https://mydomain.com/articles/my-latest-article.teaser`.

To block all URLs for the `teaser` view mode, add this to your `config.php`. This blocks all URLs of your whole website which ends on `.teaser`. Make sure to double check these settings. Otherwise you might block some pages by mistake. If you notice that strange error pages appear on your website, this would be the first place to look :)

⚠️ **Handle with care!**
```php
return [
  'flokosiol.viewmode.blockedRoutes' => [
    '(:all).teaser',
  ],
];
```

## 📋 License

[MIT](https://github.com/flokosiol/kirby-viewmode/blob/master/LICENSE)

It is discouraged to use this plugin in any project that promotes racism, sexism, homophobia, animal abuse, violence or any other form of hate speech.
