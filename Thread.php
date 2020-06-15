<?php

date_default_timezone_set('Asia/Tokyo');

class Thread
{
    private $name;
    private const THREAD_FILE = 'thread.txt';

    // コンストラクタ
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getList()
    {
        return file_get_contents(self::THREAD_FILE);
    }

    public function post(string $personal_name, string $contents) {
        $data = "<hr>\n";
        $data = $data."<p>投稿日時: ".date("Y/m/d H:i:s")."</p>\n";
        $data = $data."<p>投稿者:".$personal_name."</p>\n";
        $data = $data."<p>内容:</p>\n";
        $data = $data."<p>".nl2br($contents)."</p>\n";

        file_put_contents(self::THREAD_FILE, $data, FILE_APPEND);
    }

    public function delete() {
        file_put_contents(self::THREAD_FILE, "");
    }
}