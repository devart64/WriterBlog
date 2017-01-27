create database if not exists WriterBlog character set utf8 collate utf8_unicode_ci;
use WriterBlog;

grant all privileges on WriterBlog.* to 'blogSilex_user'@'localhost' identified by 'secret';