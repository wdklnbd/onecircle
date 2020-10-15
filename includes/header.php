<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/nprogress/0.2.0/nprogress.min.css" rel="stylesheet">
    <!-- 文章 CSS -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/post.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/owo/owo.min.css'); ?>">

    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/main.min.css'); ?>">

    <link crossorigin="anonymous" integrity="sha384-Q8BgkilbsFGYNNiDqJm69hvDS7NCJWOodvfK/cwTyQD4VQA0qKzuPpvqNER1UC0F"
          href="//lib.baomitu.com/fancybox/3.5.7/jquery.fancybox.min.css" rel="stylesheet">

    <title><?php $this->archiveTitle(array(
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <!-- 通过自有函数输出HTML头部信息 -->
    <meta itemprop="image"
          content="<?php if ($this->fields->banner && $this->fields->banner != ''):$this->fields->banner();
          else: echo explode(PHP_EOL, $this->options->bannerUrl)[0]; endif; ?>"/>
    <meta name="description" itemprop="description" content="<?php if ($this->is('index')) {
        $this->options->description();
    } elseif ($this->is('category')) {
        echo $this->getDescription();
    } elseif ($this->is('single')) {
        $this->excerpt(200, '');
    } ?>">
    <?php $this->header('description=&generator=&template='); ?>
    <?php $this->options->cssEcho(); ?>
    <?php $this->options->headerEcho(); ?>
</head>
<body>
<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand mb-0 h1 p-2 mr-auto" href="<?php $this->options->siteUrl(); ?>">
                <img class="site-logo" src="<?php $this->options->logoUrl(); ?>"
                     alt="<?php $this->options->title(); ?>"/>
                <?php $this->options->title(); ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--            <div class="p-2 mr-auto">-->
            <!--                <img class="site-logo" src="--><?php //$this->options->logoUrl(); ?><!--"-->
            <!--                     alt="--><?php //$this->options->title(); ?><!--"/>-->
            <!--                <a class="site-name" href="--><?php //$this->options->siteUrl(); ?><!--"-->
            <!--                   title="--><?php //$this->options->description(); ?><!--">-->
            <?php //$this->options->title(); ?><!--</a>-->
            <!--            </div>-->


            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar navbar-nav navbar-right ml-auto">
                    <li class="nav-item search-block-icon" aria-expanded="false"
                        aria-controls="search-block">
                        <a class="nav-link" href="#">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd"
                                      d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        </a>
                    </li>

                    <?php if ($this->user->hasLogin()):?>
                        <li class="nav-item dropdown" id="easyLogin">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <span class="hidden-sm hidden-md"><?php _e($this->user->name);?></span>
                                <b class="caret "></b><!--下三角符号-->
                                <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                                    <img class="img-circle img-40px" src="<?_e(getUserV2exAvatar($this->user->mail))?>">
                                    <i class="on md b-white bottom"></i>
                                </span>
                            </a>
                            <!-- dropdown(已经登录) -->
                            <ul class="dropdown-menu animate__fadeInRight login-dropdown" id="Logged-in">

                                <!--文章RSS订阅-->
                                <li>
                                    <a target="_blank" href="<?php $this->options->adminUrl('write-post.php')?>">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square login-svg" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                        <span>新建文章</span>
                                    </a>
                                </li>
                                <!--评论RSS订阅-->
                                <li>
                                    <a target="_blank" href="<?php $this->options->adminUrl('manage-comments.php')?>">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16"
                                             class="bi bi-credit-card-2-front login-svg" fill="currentColor"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M14 3H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                            <path d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z"/>
                                            <path fill-rule="evenodd"
                                                  d="M2 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                        </svg>
                                        <span>评论管理</span></a>
                                </li>
                                <!--后台管理(登录时候才会显示)-->
                                <li>
                                    <a target="_blank" href="<?php $this->options->adminUrl()?>">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-tools login-svg"
                                             fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                  d="M0 1l1-1 3.081 2.2a1 1 0 0 1 .419.815v.07a1 1 0 0 0 .293.708L10.5 9.5l.914-.305a1 1 0 0 1 1.023.242l3.356 3.356a1 1 0 0 1 0 1.414l-1.586 1.586a1 1 0 0 1-1.414 0l-3.356-3.356a1 1 0 0 1-.242-1.023L9.5 10.5 3.793 4.793a1 1 0 0 0-.707-.293h-.071a1 1 0 0 1-.814-.419L0 1zm11.354 9.646a.5.5 0 0 0-.708.708l3 3a.5.5 0 0 0 .708-.708l-3-3z"/>
                                            <path fill-rule="evenodd"
                                                  d="M15.898 2.223a3.003 3.003 0 0 1-3.679 3.674L5.878 12.15a3 3 0 1 1-2.027-2.027l6.252-6.341A3 3 0 0 1 13.778.1l-2.142 2.142L12 4l1.757.364 2.141-2.141zm-13.37 9.019L3.001 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z"/>
                                        </svg>
                                        <span>后台管理</span></a>
                                </li>

                                <li class="divider"></li>
                                <li>
                                    <a id="sign_out" no-pjax href="<?php $this->options->logoutUrl() ?>">退出</a>
                                </li>
                            </ul>
                            <!-- / dropdown(已经登录) -->
                        </li>

                    <?php else:?>
                        <li class="nav-item dropdown" id="easyLogin">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="feathericons">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-key">
                                    <path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path>
                                </svg>
                            </span>
                                <b class="caret"></b><!--下三角符号-->
                            </a>
                            <!-- dropdown(已经登录) -->
                            <div class="dropdown-menu w-lg wrapper bg-white animated fadeIn"
                                 aria-labelledby="navbarDropdown">
                                <form id="Login_form" name="login" action="<?php $this->options->loginAction() ?>" method="post">
                                    <div class="form-group">
                                        <label for="navbar-login-user">用户名</label>
                                        <input type="text" name="name" id="navbar-login-user" class="form-control"
                                               placeholder="用户名或电子邮箱"></div>
                                    <div class="form-group">
                                        <label for="navbar-login-password">密码</label>
                                        <input autocomplete="" type="password" name="password" id="navbar-login-password"
                                               class="form-control" placeholder="密码"></div>
                                    <button style="width: 100%;margin-bottom: 10px" type="submit" id="login-submit" name="submitLogin"
                                            class="btn-rounded box-shadow-wrap-lg btn-gd-primary padder-lg">
                                        <span>登录</span>

                                        <span class="text-active">登录中...</span>
                                        <span class="banLogin_text">刷新页面后登录 </span>
                                        <span id="ban-login" class="hide">
                                            <svg  style="position: relative;top:-1px" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-clockwise animate-spin" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                              <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                              <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                            </svg>
                                        </span>
                                        <i class="animate-spin  fontello fontello-spinner hide" id="spin-login"></i>
                                    </button>
                                    <a no-pjax href="<?php $this->options->registerUrl(); ?>">
                                        <button style="width: 100%" type="button"
                                                class="btn-rounded box-shadow-wrap-lg btn-gd-mix padder-lg">
                                            <span>注册</span>
                                        </button>
                                    </a>
                                    <input type="hidden" name="referer" value="<?php $this->options->siteUrl(); ?>">
                                </form>
                            </div>

                        </li>
                    <? endif;?>
                    <!-- mobile-nav -->
                    <li class="nav-item d-md-none">
                        <a class="nav-link" href="#" type="button" data-toggle="collapse" data-target="#mobile-nav"
                           aria-expanded="false" aria-controls="mobile-nav">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-sliders" fill="currentColor"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M14 3.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0zM11.5 5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zM7 8.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0zM4.5 10a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm9.5 3.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0zM11.5 15a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                <path fill-rule="evenodd"
                                      d="M9.5 4H0V3h9.5v1zM16 4h-2.5V3H16v1zM9.5 14H0v-1h9.5v1zm6.5 0h-2.5v-1H16v1zM6.5 9H16V8H6.5v1zM0 9h2.5V8H0v1z"/>
                            </svg>
                        </a>
                    </li>

                </ul>
            </div>


        </nav>
        <!--search area-->
        <div class="search-block" style="display: none" id="search-block">
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4>搜索</h4>
            <form name="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                <input type="text" id="s" name="s" class="text form-control"
                       placeholder="<?php _e('输入关键字搜索'); ?>"/>
                <button type="submit" class="btn btn-primary float-right search-button"><?php _e('搜索'); ?></button>
            </form>

        </div>

    </div>
</header>